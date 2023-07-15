<?php

use App\Http\Controllers\AboutController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ShopController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [IndexController::class, 'index'])->name('index');

Route::prefix('shop')->group(function () {
    Route::get('/', [ShopController::class, 'index'])->name('shop');
    Route::prefix('product')->group(function () {
        Route::get('{slug}', [ProductController::class, 'show'])->name('shop.product.show');
    });
});

Route::prefix('blog')->group(function () {
    Route::get('/', [BlogController::class, 'index'])->name('blog');
    Route::get('{slug}', [BlogController::class, 'show'])->name('blog.show');
});

Route::prefix('about')->group(function () {
    Route::get('/', [AboutController::class, 'index'])->name('about');
});

Route::prefix('contact')->group(function () {
    Route::get('/', [IndexController::class, 'index'])->name('contact');
});

Route::prefix('policy-cookies')->group(function () {
    Route::get('/', [IndexController::class, 'index'])->name('policy-cookies');
});

Route::prefix('policy-priv')->group(function () {
    Route::get('/', [IndexController::class, 'index'])->name('policy-priv');
});

Route::prefix('collaboration')->group(function () {
    Route::get('/', [IndexController::class, 'index'])->name('collaboration');
});

Route::prefix('info')->group(function () {
    Route::get('/', [IndexController::class, 'index'])->name('info');
});
