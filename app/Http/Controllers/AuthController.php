<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class AuthController extends Controller
{
    public function register(Request $request)
    {

        if ($request->password == $request->repassword) {
            $user_error = User::where('username', $request->username)->first();
            if ($user_error == null) {
                $user = User::create([
                    'firstname'   => $request->firstname,
                    'lastname'    => $request->lastname,
                    'username'    => $request->username,
                    'email'       => $request->email,
                    'password'    => Hash::make($request->password),
                ]);

                Auth::login($user);
                $request->session()->regenerate();
                return redirect('/');
            } else {
                return view('auth.register', [
                    'error' => 'Please check your username'
                ]);
            }
        } else {
            return view('auth.register', [
                'error' => 'Please check your password'
            ]);
        }
    }

    public function login(Request $request)
    {

        $user = User::where('username', $request->username)->first();
        if ($user) {

            if (Hash::check($request->password, $user['password'])) {
                Auth::login($user);
                $request->session()->regenerate();
                return redirect('/');
            } else {
                return view('auth.login', [
                    'error' => 'Please check your password'
                ]);
            }
        } else {
            return view('auth.login', [
                'error' => 'Please check your username'
            ]);
        }
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }

    public function updateProfile(Request $request)
    {
        $user = Auth::user();
        if ($user) {
            if ($request->password) {
                if ($request->password == $request->repassword) {
                    $user->email = $request->email;
                    $user->firstname = $request->firstname;
                    $user->lastname = $request->lastname;
                    $user->password = Hash::make($request->password);

                    $user->save();
                    session()->flash('success', 'Your profile was updated.');
                    return redirect('/profile');
                }else{
                    return view('auth.profile',[
                        'error' => 'please check your password'
                    ]);
                }
            } else {
                $user->email = $request->email;
                $user->firstname = $request->firstname;
                $user->lastname = $request->lastname;

                $user->save();
                session()->flash('success', 'Your profile was updated.');
                return redirect('/profile');
            }
        } else {
            return view('/');
        }
    }

    public static function addFavList($id)
    {
        if(Auth::user())
        {
            $user = Auth::user();
            if ($user['fav_products'] == Null)
            {
                $user['fav_products'] = json_encode($id);
            }else{
                $user['fav_products'] = json_encode(json_decode($user['fav_products']).",".$id);
            }
            $user->save();
            return redirect('/products');
        }else{
            return redirect('login');
        }
    }

    public static function getFavList()
    {
        if(Auth::user())
        {
            $user = Auth::user();
            $products = [];
            $fav_products_ids = explode(",",json_decode($user['fav_products']));

            foreach ($fav_products_ids as $key => $id) {
                $product = Product::where('product_id',$id)->first();
                if($product != Null){
                    array_push($products,$product);
                }
            }

            return view('auth.fav',[
                'favs' => $products
            ]);
        }else{
            return redirect('login');
        }
    }

    public static function deleteToFavList($id)
    {
        if(Auth::user())
        {
            $user = Auth::user();
            $products = [];
            $fav_products_ids = explode(",",json_decode($user['fav_products']));
            foreach ($fav_products_ids as $key => $value) {
                if($value == $id){
                    unset($fav_products_ids[$key]);
                }
            }

            $user['fav_products'] = collect($fav_products_ids)->implode(',');

            if($user['fav_products'] == ""){
                $user['fav_products'] = NULL;
            }else{
                $user['fav_products'] = json_encode($user['fav_products']);
            }

            $user->save();
            return redirect('/account/favoriler');
        }else{
            return redirect('login');
        }
    }

}
