<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Arr;

class CartController extends Controller
{
    public static function getCart()
    {
        if(Auth::user())
        {
            $cart = Cart::where([
                'user_id' => Auth::user()->id,
                'deleted_at' => Null
            ])->get();
            $products = [];
            $total_price = 0;
            foreach ($cart as  $value) {
                if($value['quantity']>0){
                    $product = Product::where('product_id',$value['product_id'])->first();
                    array_push($products,$product);
                    $total_price += $product['price'] * $value['quantity'];
                }
            }

            return view('cart.cart',[
                'products' => $products,
                'carts' => $cart,
                'total_price' => $total_price
            ]);
        }
    }

    public static function addToCart($id)
    {
        if(Auth::user())
        {
            $check_db = Cart::where([
                'user_id' => Auth::user()->id,
                'product_id' => $id,
                'deleted_at' => Null
            ])->first();
            if($check_db)
            {
                $check_db['quantity'] += 1;

                $check_db->save();
            }else {
                $cart = Cart::create([
                    'user_id' => Auth::user()->id,
                    'product_id' => $id,
                    'quantity' => 1
                ]);
            }
            return redirect("/products");
        }else{
            return redirect('/login');
        }
    }

    public static function updateToCart($status,$id)
    {
        $check_db = Cart::where([
            'user_id' => Auth::user()->id,
            'product_id' => $id,
            'deleted_at' => Null
        ])->first();

        if($check_db)
        {


            if($status == 'plus')
            {
                if($check_db['quantity'] < 5)
                {
                    $check_db['quantity'] += 1;
                    $check_db->save();
                }

            }
            if($status == 'minus')
            {
                if($check_db['quantity'] > 0)
                {
                    $check_db['quantity'] -= 1;
                    $check_db->save();
                }

            }

            if($check_db['quantity'] == 0)
            {
                return CartController::deleteToCart($check_db['id']);
            }
        }
        return redirect()->back();
    }

    public static function deleteToCart($id)
    {
        $cart = Cart::where([
            'user_id' => Auth::user()->id,
            'id' => $id,
            'deleted_at' => Null
        ])->first();
        $cart['deleted_at'] = now();
        $cart['quantity'] = 0;
        $cart->save();
        return redirect("/cart");
    }
}
