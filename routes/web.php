<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CheckoutController;


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

//Route::get('/', [SmartController::class,'goHome']);

Route::get('checkout',[CheckoutController::class, 'checkout']);
    Route::post('checkout',[CheckoutController::class, 'afterpayment'])->name('checkout.credit-card');




Route::get('/', [ProductController::class, 'productList'])->name('products.list');
Route::get('/profile/{id}', [ProductController::class, 'productprofile'])->name('product-profile');
Route::get('cart/', [CartController::class, 'cartList'])->name('cart.list');
    Route::post('cart.getlist', [CartController::class, 'cartList'])->name('cart.getlist');
    Route::post('cart', [CartController::class, 'addToCart'])->name('cart.store');
    Route::post('update-cart', [CartController::class, 'updateCart'])->name('cart.update');
    Route::post('remove', [CartController::class, 'removeCart'])->name('cart.remove');
    Route::post('clear', [CartController::class, 'clearAllCart'])->name('cart.clear');
    Route::post('total-quantity', [CartController::class, 'getTotalNbr'])->name('cart.getTotalNbr');
    Route::post('total-price', [CartController::class, 'getTotalPrice'])->name('cart.getTotalPrice');

    