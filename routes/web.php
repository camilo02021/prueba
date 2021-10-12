<?php

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
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::middleware('auth')->group(function () {
    Route::get('/books', [App\Http\Controllers\FrontController::class, 'index'])->name('books');
    Route::get('/book', [App\Http\Controllers\FrontController::class, 'show'])->name('book.show');

    //Cart
Route::get('/cesta', [App\Http\Controllers\CartController::class, 'index'])->name('cart.index');
Route::post('/cart/store', [App\Http\Controllers\CartController::class, 'store'])->name('cart.store');
Route::post('/cart/recoverItems', [App\Http\Controllers\CartController::class, 'recoverItems']);
Route::patch('/cart/update', [App\Http\Controllers\CartController::class, 'update'])->name('cart.update');
Route::delete('/cart/{product}', [App\Http\Controllers\CartController::class, 'destroy'])->name('cart.destroy');
Route::post('/cart/delete', [App\Http\Controllers\CartController::class, 'delete']);
Route::post('/cart/switchToSaveForLater/{product}', [App\Http\Controllers\CartController::class, 'switchToSaveForLater'])->name('cart.switchToSaveForLater');
//
});

