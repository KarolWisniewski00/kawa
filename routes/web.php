<?php

use App\Http\Controllers\AboutController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\BusketController;
use App\Http\Controllers\CollaborationController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\GrindingAdminController;
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
use App\Http\Controllers\SizeAdminController;
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
            Route::post('/upload', [PhotoAdminController::class, 'upload'])->name('dashboard.photo.upload');
            Route::delete('/delete/{slug}', [PhotoAdminController::class, 'delete'])->name('dashboard.photo.delete');
        });
        Route::prefix('shop')->group(function () {
            Route::prefix('product')->group(function () {
                Route::get('/', [ProductAdminController::class, 'index'])->name('dashboard.shop.product');
                Route::get('/create', [ProductAdminController::class, 'create'])->name('dashboard.shop.product.create');
                Route::post('/store', [ProductAdminController::class, 'store'])->name('dashboard.shop.product.store');
                Route::get('/edit/{size}', [ProductAdminController::class, 'edit'])->name('dashboard.shop.product.edit');
                Route::put('/update/{size}', [ProductAdminController::class, 'update'])->name('dashboard.shop.product.update');
                Route::delete('/delete/{size}', [ProductAdminController::class, 'delete'])->name('dashboard.shop.product.delete');
            });
            Route::prefix('size')->group(function () {
                Route::get('/', [SizeAdminController::class, 'index'])->name('dashboard.shop.size');
                Route::get('/create', [SizeAdminController::class, 'create'])->name('dashboard.shop.size.create');
                Route::post('/store', [SizeAdminController::class, 'store'])->name('dashboard.shop.size.store');
                Route::get('/edit/{size}', [SizeAdminController::class, 'edit'])->name('dashboard.shop.size.edit');
                Route::put('/update/{size}', [SizeAdminController::class, 'update'])->name('dashboard.shop.size.update');
                Route::delete('/delete/{size}', [SizeAdminController::class, 'delete'])->name('dashboard.shop.size.delete');
            });
            Route::prefix('grinding')->group(function () {
                Route::get('/', [GrindingAdminController::class, 'index'])->name('dashboard.shop.grinding');
                Route::get('/create', [GrindingAdminController::class, 'create'])->name('dashboard.shop.grinding.create');
                Route::post('/store', [GrindingAdminController::class, 'store'])->name('dashboard.shop.grinding.store');
                Route::get('/edit/{grinding}', [GrindingAdminController::class, 'edit'])->name('dashboard.shop.grinding.edit');
                Route::put('/update/{grinding}', [GrindingAdminController::class, 'update'])->name('dashboard.shop.grinding.update');
                Route::delete('/delete/{grinding}', [GrindingAdminController::class, 'delete'])->name('dashboard.shop.grinding.delete');
            });
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
