<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class AdminController extends Controller
{
    public static function getUsers()
    {
        return view('admin.users',[
            'users' => User::all()
        ]);

    }

    public static function editUser(Request $request,$id)
    {
        $user = User::where('id',$id)->first();
        if($request->role == 'on')
        {
            $user['role'] = 'admin';
        }elseif($request->role == Null)
        {
            $user['role'] = 'regular';
        }
        $user->save();

        return redirect('/admin/users');

    }

    public static function getAllProducts()
    {
        $products = Product::all();

        return view('admin.productList',[
            'products' => $products
        ]);

    }


    public static function createProduct(Request $request)
    {
        $product = Product::create([
            "product_id"   => Str::uuid(),
            "name"         => $request->name,
            "price"        => $request->price,
            "description"  => $request->description,
            "category_id"     => $request->category,
            "imageUrl"     => $request->imageUrl,
        ]);

        return view('admin.productList',[
            'products' => Product::all()
        ]);
    }

    public static function editProductForm(Request $request,$id)
    {
        $product = Product::where('product_id',$id)->first();
        return view('admin.editProduct',[
            'product' => $product,
            'categories' => ProductController::getCategories(),
        ]);
    }

    public static function editProduct(Request $request,$id)
    {
        $product = Product::where('product_id',$id)->first();
        $product['name'] = $request->name;
        $product['price'] = $request->price;
        $product['description'] = $request->description;
        $product['category_id'] = $request->category;
        if($request->imageUrl){
            $product['imageUrl'] = $request->imageUrl;
        }
        if($request->is_delete == 'on')
        {
            $product['deleted_at'] = now();
        }elseif($request->is_delete == Null){
            $product['deleted_at'] = Null;
        }
        $product->save();
        return redirect('admin/products');
    }

    public static function deleteProduct($id)
    {
        $product = Product::where('product_id',$id)->first();
        $product['deleted_at'] = now();
        $product->save();
        return view('admin.productList',[
            'products' => Product::all()
        ]);
    }
}
