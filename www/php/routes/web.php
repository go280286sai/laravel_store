<?php

use App\Http\Controllers\CartController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
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

Route::controller(CartController::class)->group(function () {
    Route::get('/cart', 'index')->name('cart');
    Route::get('/cart/get', 'getAll')->name('cart.get');
    Route::get('/cart/remove', 'remove')->name('cart.remove');
    Route::match(['GET', 'POST'],'/cart/update', 'update')->name('cart.update');
    Route::get('/cart/add', 'add')->name('cart.add');
});

Route::controller(\App\Http\Controllers\MainController::class)->group(function () {
    Route::get('/', 'index')->name('home');
});

Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});



Route::get('/cart/clearCart', function (){
   \Illuminate\Support\Facades\Session::remove('cart');
   return redirect()->route('home');
});
Route::get('/product/{id}', [ProductController::class, 'view'])->name('product');
Route::get('/parent/{id}', [ProductController::class, 'parent'])->name('parent');
Route::get('/lang/{lang}', function ($lang) {
    \Illuminate\Support\Facades\Cache::put('lang', $lang);
    return redirect()->back();
});
Route::get('/cart_reload', function (){
   if(\Illuminate\Support\Facades\Session::has('cart')){
       return count(\Illuminate\Support\Facades\Session::get('cart'));
   }
    return 0;
});
Route::get('/404', function (){
    return view('layouts.404');
});
Route::get('/category/{id}', [ProductController::class, 'category'])->name('category');
require __DIR__.'/auth.php';
