<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CheckoutController;

// Trang chủ - hiển thị danh sách sản phẩm
Route::get('/', [ProductController::class, 'index'])->name('home');

// Trang danh sách sản phẩm (cũng dùng chung controller index)
Route::get('/products', [ProductController::class, 'index'])->name('products.index');

// Các route yêu cầu đăng nhập
Route::middleware('auth')->group(function () {
    Route::post('/order/{id}', [OrderController::class, 'store'])->name('order.store');
});

// Route giỏ hàng
Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
Route::post('/cart/add/{product}', [CartController::class, 'add'])->name('cart.add');
Route::put('/cart/update/{product}', [CartController::class, 'update'])->name('cart.update');
Route::delete('/cart/remove/{product}', [CartController::class, 'remove'])->name('cart.remove');
Route::delete('/cart/clear', [CartController::class, 'clear'])->name('cart.clear');

Route::get('/checkout', [CheckoutController::class, 'index'])->name('checkout.index');
Route::post('/checkout', [CheckoutController::class, 'store'])->name('checkout.store');
Route::get('/thank-you', [CheckoutController::class, 'thankYou'])->name('thank.you');
// Load các route auth (login, register, logout...)
require __DIR__.'/auth.php';