<?php

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Admin\OrderProductController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Client\CartController;
use App\Http\Controllers\Client\MainController;
use Illuminate\Support\Facades\Route;

Route::prefix('admin')->group(function () {
    Route::name('admin.')->group(function () {
        Route::get('/', function () {
            return view('admin.index');
        })->name('index');
        Route::resource('categories', CategoryController::class);
        Route::resource('products', ProductController::class);
        Route::resource('orders', OrderController::class);
        Route::resource('orders.products', OrderProductController::class)->only([
            'store', 'destroy', 'update'
        ]);
        Route::resource('users', UserController::class);
    });
});

Route::name('client.')->group(function () {
    Route::get('/', function () {
        return view('client.welcome');
    })->name('welcome');
    Route::get('/products', [MainController::class, 'index'])->name('index');
    Route::get('/cart', [CartController::class, 'index'])->name('cart');
    Route::post('/cart', [CartController::class, 'add'])->name('cart.store');
    Route::delete('/cart/{product}', [CartController::class, 'destroy'])->name('cart.destroy');
    Route::patch('/cart/{product}', [CartController::class, 'update'])->name('cart.update');
});
