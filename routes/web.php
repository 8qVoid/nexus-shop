<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CheckoutController;
use App\Models\Product;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application.
| These routes are loaded by the RouteServiceProvider within a group
| which contains the "web" middleware group. Now create something great!
|
*/

// ----------------- SHOP -----------------
Route::get('/', function () {
    $products = Product::all(); // fetch all products from database
    return view('welcome', compact('products'));
})->name('shop');

// ----------------- CART -----------------
Route::prefix('cart')->group(function () {
    Route::get('/', [CartController::class, 'index'])->name('cart');                     // view cart
    Route::get('/add/{id}', [CartController::class, 'add'])->name('cart.add');           // add product to cart
    Route::get('/remove/{id}', [CartController::class, 'remove'])->name('cart.remove'); // remove item
    Route::get('/increase/{id}', [CartController::class, 'increase'])->name('cart.increase'); // increase quantity
    Route::get('/decrease/{id}', [CartController::class, 'decrease'])->name('cart.decrease'); // decrease quantity
});

// ----------------- CHECKOUT -----------------
Route::prefix('checkout')->group(function () {
    Route::get('/', [CheckoutController::class, 'checkout'])->name('checkout');                  // show checkout page
    Route::post('/process', [CheckoutController::class, 'process'])->name('checkout.process');   // process checkout
    Route::get('/success/{order}', [CheckoutController::class, 'success'])->name('checkout.success'); // success page
    Route::get('/failed/{order}', [CheckoutController::class, 'failed'])->name('checkout.failed');    // failed page
});
