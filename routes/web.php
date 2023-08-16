<?php

use App\Http\Controllers\AboutController;
use App\Http\Controllers\BlogAdminController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\BusketController;
use App\Http\Controllers\CollaborationController;
use App\Http\Controllers\CompanyAdminController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\CookiesAdminController;
use App\Http\Controllers\GrindingAdminController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\InfoAdminController;
use App\Http\Controllers\InfoController;
use App\Http\Controllers\InstagramAdminController;
use App\Http\Controllers\OrderAdminController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\PhotoAdminController;
use App\Http\Controllers\PolicyCookiesController;
use App\Http\Controllers\PolicyPrivController;
use App\Http\Controllers\PrivAdminController;
use App\Http\Controllers\ProductAdminController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\RuleAdminController;
use App\Http\Controllers\RuleController;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\SizeAdminController;
use App\Http\Controllers\UserAdminController;
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
    Route::get('{blog}', [BlogController::class, 'show'])->name('blog.show');
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
        Route::prefix('/')->group(function () {
            Route::get('/', [OrderAdminController::class, 'index'])->name('dashboard');
            Route::get('/show/{order}', [OrderAdminController::class, 'show'])->name('dashboard.order.show');
            Route::put('/update/{order}', [OrderAdminController::class, 'update'])->name('dashboard.order.update');
            Route::delete('/delete/{order}', [OrderAdminController::class, 'delete'])->name('dashboard.order.delete');
            Route::get('/status/{id}/{slug}', [OrderAdminController::class, 'status'])->name('dashboard.order.status');
        });
        Route::prefix('photo')->group(function () {
            Route::get('/', [PhotoAdminController::class, 'index'])->name('dashboard.photo');
            Route::post('/upload', [PhotoAdminController::class, 'upload'])->name('dashboard.photo.upload');
            Route::delete('/delete/{slug}', [PhotoAdminController::class, 'delete'])->name('dashboard.photo.delete');
        });
        Route::prefix('blog')->group(function () {
            Route::get('/', [BlogAdminController::class, 'index'])->name('dashboard.blog');
            Route::get('/create', [BlogAdminController::class, 'create'])->name('dashboard.blog.create');
            Route::post('/store', [BlogAdminController::class, 'store'])->name('dashboard.blog.store');
            Route::get('/edit/{blog}', [BlogAdminController::class, 'edit'])->name('dashboard.blog.edit');
            Route::put('/update/{blog}', [BlogAdminController::class, 'update'])->name('dashboard.blog.update');
            Route::delete('/delete/{blog}', [BlogAdminController::class, 'delete'])->name('dashboard.blog.delete');
        });
        Route::prefix('shop')->group(function () {
            Route::prefix('product')->group(function () {
                Route::get('/', [ProductAdminController::class, 'index'])->name('dashboard.shop.product');
                Route::get('/create', [ProductAdminController::class, 'create'])->name('dashboard.shop.product.create');
                Route::post('/store', [ProductAdminController::class, 'store'])->name('dashboard.shop.product.store');
                Route::get('/edit/{product}', [ProductAdminController::class, 'edit'])->name('dashboard.shop.product.edit');
                Route::put('/update/{product}', [ProductAdminController::class, 'update'])->name('dashboard.shop.product.update');
                Route::delete('/delete/{product}', [ProductAdminController::class, 'delete'])->name('dashboard.shop.product.delete');
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
        Route::prefix('technic')->group(function () {
            Route::prefix('rule')->group(function () {
                Route::get('/', [RuleAdminController::class, 'index'])->name('dashboard.technic.rule');
                Route::get('/create', [RuleAdminController::class, 'create'])->name('dashboard.technic.rule.create');
                Route::post('/store', [RuleAdminController::class, 'store'])->name('dashboard.technic.rule.store');
                Route::get('/edit/{element}', [RuleAdminController::class, 'edit'])->name('dashboard.technic.rule.edit');
                Route::put('/update/{element}', [RuleAdminController::class, 'update'])->name('dashboard.technic.rule.update');
                Route::delete('/delete/{element}', [RuleAdminController::class, 'delete'])->name('dashboard.technic.rule.delete');
            });
            Route::prefix('priv')->group(function () {
                Route::get('/', [PrivAdminController::class, 'index'])->name('dashboard.technic.priv');
                Route::get('/create', [PrivAdminController::class, 'create'])->name('dashboard.technic.priv.create');
                Route::post('/store', [PrivAdminController::class, 'store'])->name('dashboard.technic.priv.store');
                Route::get('/edit/{element}', [PrivAdminController::class, 'edit'])->name('dashboard.technic.priv.edit');
                Route::put('/update/{element}', [PrivAdminController::class, 'update'])->name('dashboard.technic.priv.update');
                Route::delete('/delete/{element}', [PrivAdminController::class, 'delete'])->name('dashboard.technic.priv.delete');
            });
            Route::prefix('cookies')->group(function () {
                Route::get('/', [CookiesAdminController::class, 'index'])->name('dashboard.technic.cookies');
                Route::get('/create', [CookiesAdminController::class, 'create'])->name('dashboard.technic.cookies.create');
                Route::post('/store', [CookiesAdminController::class, 'store'])->name('dashboard.technic.cookies.store');
                Route::get('/edit/{element}', [CookiesAdminController::class, 'edit'])->name('dashboard.technic.cookies.edit');
                Route::put('/update/{element}', [CookiesAdminController::class, 'update'])->name('dashboard.technic.cookies.update');
                Route::delete('/delete/{element}', [CookiesAdminController::class, 'delete'])->name('dashboard.technic.cookies.delete');
            });
            Route::prefix('info')->group(function () {
                Route::get('/', [InfoAdminController::class, 'index'])->name('dashboard.technic.info');
                Route::get('/create', [InfoAdminController::class, 'create'])->name('dashboard.technic.info.create');
                Route::post('/store', [InfoAdminController::class, 'store'])->name('dashboard.technic.info.store');
                Route::get('/edit/{element}', [InfoAdminController::class, 'edit'])->name('dashboard.technic.info.edit');
                Route::put('/update/{element}', [InfoAdminController::class, 'update'])->name('dashboard.technic.info.update');
                Route::delete('/delete/{element}', [InfoAdminController::class, 'delete'])->name('dashboard.technic.info.delete');
            });
            Route::prefix('company')->group(function () {
                Route::get('/', [CompanyAdminController::class, 'index'])->name('dashboard.technic.company');
                Route::get('/edit/{element}', [CompanyAdminController::class, 'edit'])->name('dashboard.technic.company.edit');
                Route::put('/update/{element}', [CompanyAdminController::class, 'update'])->name('dashboard.technic.company.update');
            });
            Route::prefix('instagram')->group(function () {
                Route::get('/', [InstagramAdminController::class, 'index'])->name('dashboard.technic.instagram');
                Route::get('/create', [InstagramAdminController::class, 'create'])->name('dashboard.technic.instagram.create');
                Route::post('/store', [InstagramAdminController::class, 'store'])->name('dashboard.technic.instagram.store');
                Route::get('/edit/{instagram}', [InstagramAdminController::class, 'edit'])->name('dashboard.technic.instagram.edit');
                Route::put('/update/{instagram}', [InstagramAdminController::class, 'update'])->name('dashboard.technic.instagram.update');
                Route::delete('/delete/{instagram}', [InstagramAdminController::class, 'delete'])->name('dashboard.technic.instagram.delete');
            });
        });
        Route::prefix('user')->group(function () {
            Route::get('/', [UserAdminController::class, 'index'])->name('dashboard.user');
            Route::delete('/delete/{user}', [UserAdminController::class, 'delete'])->name('dashboard.user.delete');
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
            Route::get('/show/{slug}', [OrderController::class, 'show'])->name('account.order.show');
            Route::get('/create', [OrderController::class, 'create'])->name('account.order.create');
            Route::post('/store', [OrderController::class, 'store'])->name('account.order.store');
        });
        Route::prefix('busket')->group(function () {
            Route::get('/', [BusketController::class, 'index'])->name('account.busket');
            Route::post('/add/{product}', [BusketController::class, 'add'])->name('account.busket.add');
            Route::post('/minus/{product}', [BusketController::class, 'minus'])->name('account.busket.minus');
            Route::post('/remove/{product}', [BusketController::class, 'remove'])->name('account.busket.remove');
        });
    });
});
