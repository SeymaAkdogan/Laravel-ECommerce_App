<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\ProductController;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('index', [
        'categories' => ProductController::getCategories()
    ]);
});

Route::middleware(['auth', 'isAdmin'])->group(function () {
    Route::prefix('admin')->group(function () {
        Route::get('/users', [AdminController::class, 'getUsers']);
        Route::post('/edit-user/{id}', [AdminController::class, 'editUser']);

        Route::get('/create-product', function () {
            return view('admin.createProduct', [
                'categories' => ProductController::getCategories()
            ]);
        });
        Route::get('/products', [AdminController::class, 'getAllProducts']);
        Route::post('/create-product', [AdminController::class, 'createProduct']);
        Route::get('/edit-product/{id}', [AdminController::class, 'editProductForm']);
        Route::post('/edit-product/{id}', [AdminController::class, 'editProduct']);
        Route::get('/delete-product/{id}', [AdminController::class, 'deleteProduct']);
    });
});


Route::get('/login', function () {
    return view('auth.login');
});
Route::post('/login', [AuthController::class, 'login']);
Route::get('/register', function () {
    return view('auth.register');
});
Route::post('/register', [AuthController::class, 'register']);
Route::get('/profile', function () {
    return view('auth.profile');
});
Route::post('/profile', [AuthController::class, 'updateProfile']);
Route::get('/logout', [AuthController::class, 'logout']);
Route::get('/add-to-fav/{id}', [AuthController::class, 'addFavList']);
Route::get('/account/favorites', [AuthController::class, 'getFavList']);
Route::get('/delete-to-favList/{id}', [AuthController::class, 'deleteToFavList']);

Route::get('/products', [ProductController::class, 'getAllProducts']);
Route::get('/product/{id}', [ProductController::class, 'getProductDetail']);
Route::get('/categories/{category:category_id}', [ProductController::class, 'getProductsByCategory']);

Route::get('/cart', [CartController::class, 'getCart']);
Route::get('/add-to-cart/{id}', [CartController::class, 'addToCart']);
Route::get('/delete-to-cart/{id}', [CartController::class, 'deleteToCart']);
Route::get('/update-to-cart/{status}/{id}', [CartController::class, 'updateToCart']);
