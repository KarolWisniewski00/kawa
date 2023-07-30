<?php

use App\Http\Controllers\AboutController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\BusketController;
use App\Http\Controllers\CollaborationController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\InfoController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\PhotoAdminController;
use App\Http\Controllers\PolicyCookiesController;
use App\Http\Controllers\PolicyPrivController;
use App\Http\Controllers\ProductAdminController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\RuleController;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\UserController;
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
    Route::get('/', [ContactController::class, 'index'])->name('contact');
});

Route::prefix('policy-cookies')->group(function () {
    Route::get('/', [PolicyCookiesController::class, 'index'])->name('policy-cookies');
});

Route::prefix('policy-priv')->group(function () {
    Route::get('/', [PolicyPrivController::class, 'index'])->name('policy-priv');
});

Route::prefix('collaboration')->group(function () {
    Route::get('/', [CollaborationController::class, 'index'])->name('collaboration');
});

Route::prefix('info')->group(function () {
    Route::get('/', [InfoController::class, 'index'])->name('info');
});
Route::prefix('rule')->group(function () {
    Route::get('/', [RuleController::class, 'index'])->name('rule');
});

//ADMIN
Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
    'admin',
])->group(function () {
    Route::prefix('dashboard')->group(function () {
        Route::get('/', function () {return view('dashboard');})->name('dashboard');
        Route::prefix('photo')->group(function () {
            Route::get('/', [PhotoAdminController::class, 'index'])->name('dashboard.photo');
        });
        Route::prefix('product')->group(function () {
            Route::get('/', [ProductAdminController::class, 'index'])->name('dashboard.product');
            Route::get('/create', [ProductAdminController::class, 'create'])->name('dashboard.product.create');
        });
    });
});
//LOGGED IN
Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::prefix('account')->group(function () {
        Route::prefix('user')->group(function () {
            Route::get('/', [UserController::class, 'index'])->name('account.user');
        });
        Route::prefix('order')->group(function () {
            Route::get('/', [OrderController::class, 'index'])->name('account.order');
        });
        Route::prefix('busket')->group(function () {
            Route::get('/', [BusketController::class, 'index'])->name('account.busket');
        });
    });
});
