<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    public static function getCategories()
    {
        $categories = Category::where([
            "deleted_at" => NULL
        ])->get();

        return $categories;
    }

    public static function getAllProducts(Request $request)
    {
        $products = DB::table('products')
                    ->whereNull('deleted_at');


        $min_price = $request->min;
        $max_price = $request->max;
        $category = $request->category;
        $selected_category = '';
        $search = $request->search;


        if ($_GET) {
            if($min_price && $max_price)
            {
                $products = $products->whereBetween('price', [$min_price, $max_price]);
            }
            if($category)
            {
                $products = $products->where("category_id",$request->category);
                $selected_category = $category;
            }

            if($search)
            {
                $products = $products->where('name', 'LIKE', '%' . $search . '%')
                            ->orWhere('description', 'LIKE', '%' . $search . '%');
            }
        }

        return view('product.productList',[
            'products' => json_decode($products->get(),true),
            'categories' => ProductController::getCategories(),
            'selected_category' => $selected_category,
            'min_price' => $min_price,
            'max_price' => $max_price,
            'search' => $request->search,
        ]);
    }


    public static function getProductDetail($product_id)
    {
        $product = Product::where([
            "deleted_at" => NULL,
            "product_id" => $product_id
        ])->first();


        $similar_products = DB::table('products')
                            ->where('product_id', '!=', $product['product_id'])
                            ->where('category_id', '=', $product['category_id'])
                            ->whereNull('deleted_at')
                            ->get();
        return view('product.productDetail',[
            'product' => $product,
            'similar_products' => json_decode($similar_products,true)
        ]);
    }

    public static function getProductsByCategory($category_id)
    {

        $products = Product::where([
            "deleted_at" => NULL,
            "category_id" => $category_id
        ])->get();



        return view('product.productList',[
            'products' => $products,
            'categories' => ProductController::getCategories(),
            'selected_category' => $category_id
        ]);
    }




}
