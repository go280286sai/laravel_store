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

//Route::get('/', function () {
//    return Inertia::render('Welcome', [
//        'canLogin' => Route::has('login'),
//        'canRegister' => Route::has('register'),
//        'laravelVersion' => Application::VERSION,
//        'phpVersion' => PHP_VERSION,
//    ]);
//});

Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::controller(\App\Http\Controllers\MainController::class)->group(function () {
    Route::get('/', 'index', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ])->name('home');
});
Route::controller(CartController::class)->group(function () {
   Route::get('/cart', 'index')->name('cart');
   Route::get('/cart/get', 'getAll')->name('cart.get');
   Route::get('/cart/remove', 'remove')->name('cart.remove');
   Route::match(['GET', 'POST'],'/cart/update', 'editAmount')->name('cart.update');
});
Route::get('/cart/add', [CartController::class, 'add']);
Route::get('/product/{slug}', [ProductController::class, 'view'])->name('product');
Route::get('/lang/{lang}', function ($lang) {
    \Illuminate\Support\Facades\Cache::put('lang', $lang);
    return redirect()->back();
//    return redirect()->route('home');
});
require __DIR__.'/auth.php';
