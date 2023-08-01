<?php

use App\Http\Controllers\CartController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\WishlistController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

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
//---------------------------------------------------------------------------
//Cart controller
Route::controller(CartController::class)->group(function () {
    Route::get('/cart/get', 'getAll')->name('cart.get');
    Route::get('/cart/remove', 'remove')->name('cart.remove');
    Route::get('/cart/update', 'update')->name('cart.update');
    Route::get('/cart/add', 'add')->name('cart.add');
    Route::get('/cart/clear', 'clear')->name('cart.clear');
});
//----------------------------------------------------------------------------
//Main controller
Route::controller(\App\Http\Controllers\MainController::class)->group(function () {
    Route::get('/', 'index')->name('home');
});
//----------------------------------------------------------------------------
//Product controller
Route::controller(ProductController::class)->group(function () {
    Route::get('/product/{id}', 'view')->name('product');
    Route::get('/parent/{id}', 'parent')->name('parent');
    Route::get('/category/{id}', 'category')->name('category');
});
//---------------------------------------------------------------------------
//WishlistController
Route::controller(WishlistController::class)->group(function () {
    Route::get('/wishlist', 'index')->name('wishlist');
    Route::get('/wishlist/get', 'get')->name('wishlist.get');
    Route::get('/wishlist/add', 'add')->name('wishlist.add');
    Route::get('/wishlist/remove', 'remove')->name('wishlist.remove');
});
//---------------------------------------------------------------------------

Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
//------------------------------------------------------------------
//Page is not found
Route::get('/404', function () {
    return view('layouts.404');
});
//------------------------------------------------------------------
//Select language
Route::get('/lang/{lang}', function ($lang) {
    \Illuminate\Support\Facades\Cache::put('lang', $lang);

    return redirect()->back();
});
//------------------------------------------------------------------
//Get count in cart
Route::get('/cart_reload', function () {
    if (\Illuminate\Support\Facades\Session::has('cart')) {
        return count(\Illuminate\Support\Facades\Session::get('cart'));
    }

    return 0;
});
//------------------------------------------------------------------
Route::get('/test', function () {
    $product = 9;
    $products = \App\Models\Product::get_category($product);
    echo $products['title_product'];
    $main = \App\Models\Category::get_main($products['category_id']);
    echo $main['title_category'];
    echo \App\Models\Main::get_title($main['main_id']);
    dd($main['main_id']);

});
require __DIR__.'/auth.php';
