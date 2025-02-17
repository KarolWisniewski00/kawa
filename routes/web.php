<?php

use App\Http\Controllers\AboutController;
use App\Http\Controllers\AjaxAdminController;
use App\Http\Controllers\BlogAdminController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\BusketController;
use App\Http\Controllers\CategoryAdminController;
use App\Http\Controllers\ClientAdminController;
use App\Http\Controllers\CollaborationController;
use App\Http\Controllers\CompanyAdminController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\CookiesAdminController;
use App\Http\Controllers\DiscountAdminController;
use App\Http\Controllers\GoogleLoginController;
use App\Http\Controllers\GrindingAdminController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\InfoAdminController;
use App\Http\Controllers\InfoController;
use App\Http\Controllers\InpostAdminController;
use App\Http\Controllers\InstagramAdminController;
use App\Http\Controllers\NewBusketController;
use App\Http\Controllers\OrderAdminController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\PaymentController;
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
use App\Http\Controllers\WebhookController;
use App\Models\Blog;
use App\Models\Product;
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
Route::get('/dark', [IndexController::class, 'dark'])->name('dark');

Route::prefix('sklep')->group(function () {
    Route::get('/', [ShopController::class, 'index'])->name('shop');
    Route::get('kategoria/{name}', [ShopController::class, 'indexCategory'])->name('shop.category');//
    Route::get('platności', [OrderController::class, 'create'])->name('account.order.create');
    Route::get('koszyk', [NewBusketController::class, 'index'])->name('shop.cart.busket');
    Route::get('zamowienie/{slug}', [OrderController::class, 'show'])->name('account.order.show');
    Route::prefix('cart')->group(function () {
        Route::get('get', [NewBusketController::class, 'get'])->name('shop.cart.get');
        Route::post('add/{product}', [NewBusketController::class, 'add'])->name('shop.cart.add');
        Route::post('minus/{product}', [NewBusketController::class, 'minus'])->name('shop.cart.minus');
        Route::post('remove/{product}', [NewBusketController::class, 'remove'])->name('shop.cart.remove');
        Route::post('/store', [OrderController::class, 'store'])->name('account.order.store');
        Route::get('/status/{id}/{slug}', [OrderController::class, 'status'])->name('account.order.status');
        Route::post('/check', [DiscountAdminController::class, 'check'])->name('check.discount');
    });
    Route::prefix('produkt')->group(function () {
        Route::get('{name}', [ProductController::class, 'show'])->name('shop.product.show');//
    });
});

Route::get('/login/google', [GoogleLoginController::class, 'redirectToGoogle'])->name('login.google');
Route::get('/login/google/callback', [GoogleLoginController::class, 'handleGoogleCallback']);

Route::post('/payment/status', [PaymentController::class, 'status'])->name('payment.status');

Route::prefix('webhook')->group(function () {
    Route::get('/', [WebhookController::class, 'inpost'])->name('webhook.inpost');
});

Route::prefix('blog')->group(function () {
    Route::get('/', [BlogController::class, 'index'])->name('blog');
    Route::get('{title}', [BlogController::class, 'show'])->name('blog.show');//
});

Route::prefix('o-nas')->group(function () {
    Route::get('/', [AboutController::class, 'index'])->name('about');
});

Route::prefix('kontakt')->group(function () {
    Route::get('/', [ContactController::class, 'index'])->name('contact');
    Route::post('/store', [ContactController::class, 'store'])->name('contact.store');
});

Route::prefix('polityka-cookies')->group(function () {
    Route::get('/', [PolicyCookiesController::class, 'index'])->name('policy-cookies');
});

Route::prefix('polityka-prywatnosci')->group(function () {
    Route::get('/', [PolicyPrivController::class, 'index'])->name('policy-priv');
});

Route::prefix('wspolpraca')->group(function () {
    Route::get('/', [CollaborationController::class, 'index'])->name('collaboration');
});

Route::prefix('regulamin')->group(function () {
    Route::get('/', [RuleController::class, 'index'])->name('rule');
});

//REDIRECT 301
Route::prefix('shop')->group(function () {
    Route::get('/', function () {
        return redirect()->route('shop')->setStatusCode(301);
    });
    Route::get('category/{name}', function ($name) {
        return redirect()->route('shop.category', ['name' => str_replace(' ', '-', $name)])->setStatusCode(301);
    });
    Route::prefix('cart')->group(function () {
        Route::get('/', function () {
            return redirect()->route('shop.cart.busket')->setStatusCode(301);
        });
        Route::get('/create', function () {
            return redirect()->route('account.order.create')->setStatusCode(301);
        });
        Route::get('/show/{slug}', function ($slug) {
            return redirect()->route('account.order.show', ['slug' => $slug])->setStatusCode(301);
        });
    });
    Route::get('product/{slug}', function ($slug) {
        $product = Product::where('id', $slug)->first();
        return redirect()->route('shop.product.show', ['name' => str_replace(' ', '-', $product->name)])->setStatusCode(301);
    });
});
Route::get('blog/{blog}', function ($blog) {
    $blog = Blog::where('id', $blog)->first();
    return redirect()->route('blog.show', ['name' => str_replace(' ', '-', $blog->name)])->setStatusCode(301);
});
Route::get('about', function () {
    return redirect()->route('about')->setStatusCode(301);
});
Route::get('policy-priv', function () {
    return redirect()->route('policy-priv')->setStatusCode(301);
});
Route::get('policy-cookies', function () {
    return redirect()->route('policy-cookies')->setStatusCode(301);
});
Route::get('collaboration', function () {
    return redirect()->route('collaboration')->setStatusCode(301);
});
Route::get('rule', function () {
    return redirect()->route('rule')->setStatusCode(301);
});
Route::get('contact', function () {
    return redirect()->route('contact')->setStatusCode(301);
});
//LOGGED IN
Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::prefix('konto')->group(function () {
        Route::prefix('uzytkownik')->group(function () {
            Route::get('/', [UserController::class, 'index'])->name('account.user');
            Route::get('/edycja/{element}', [UserController::class, 'edit'])->name('account.user.edit');
            Route::put('/update/{element}', [UserController::class, 'update'])->name('account.user.update');
            Route::delete('/delete', [UserController::class, 'delete'])->name('account.user.delete');
        });
        Route::prefix('zamowienia')->group(function () {
            Route::get('/', [OrderController::class, 'index'])->name('account.order');
        });
    });
});


//ADMIN
Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
    'admin',
])->group(function () {
    Route::prefix('dashboard')->group(function () {
        Route::prefix('/ajax')->group(function () {
            Route::get('/payment', [AjaxAdminController::class, 'payment'])->name('ajax.payment');
        });
        Route::prefix('/')->group(function () {
            Route::get('/', [OrderAdminController::class, 'index'])->name('dashboard');
            Route::get('/show/{order}', [OrderAdminController::class, 'show'])->name('dashboard.order.show');
            Route::get('/showByShipmentId/{id}', [OrderAdminController::class, 'showByShipmentId'])->name('dashboard.order.showByShipmentId');
            Route::put('/update/{order}', [OrderAdminController::class, 'update'])->name('dashboard.order.update');
            Route::delete('/delete/{order}', [OrderAdminController::class, 'delete'])->name('dashboard.order.delete');
            Route::get('/status/{id}/{slug}', [OrderAdminController::class, 'status'])->name('dashboard.order.status');
            Route::get('/email/{order}', [OrderAdminController::class, 'email'])->name('dashboard.order.email');
        });
        Route::prefix('photo')->group(function () {
            Route::get('/', [PhotoAdminController::class, 'index'])->name('dashboard.photo');
            Route::post('/upload', [PhotoAdminController::class, 'upload'])->name('dashboard.photo.upload');
            Route::delete('/delete/{slug}', [PhotoAdminController::class, 'delete'])->name('dashboard.photo.delete');
        });
        Route::prefix('blog')->group(function () {
            Route::get('/', [BlogAdminController::class, 'index'])->name('dashboard.blog');
            Route::get('/create', [BlogAdminController::class, 'create'])->name('dashboard.blog.create');
            Route::get('/create-second', [BlogAdminController::class, 'createSecond'])->name('dashboard.blog.create.second');
            Route::post('/store', [BlogAdminController::class, 'store'])->name('dashboard.blog.store');
            Route::post('/store-second', [BlogAdminController::class, 'storeSecond'])->name('dashboard.blog.store.second');
            Route::get('/edit/{blog}', [BlogAdminController::class, 'edit'])->name('dashboard.blog.edit');
            Route::get('/edit-second/{blog}', [BlogAdminController::class, 'editSecond'])->name('dashboard.blog.edit.second');
            Route::put('/update/{blog}', [BlogAdminController::class, 'update'])->name('dashboard.blog.update');
            Route::put('/update-second/{blog}', [BlogAdminController::class, 'updateSecond'])->name('dashboard.blog.update.second');
            Route::delete('/delete/{blog}', [BlogAdminController::class, 'delete'])->name('dashboard.blog.delete');
        });
        Route::prefix('inpost')->group(function () {
            Route::get('/', [InpostAdminController::class, 'index'])->name('dashboard.inpost');
            Route::get('/createShipmentPointToPoint/{order}/{size}', [InpostAdminController::class, 'createShipmentPointToPoint'])->name('inpost.createShipmentPointToPoint');
            Route::post('/createShipmentCarrierToCarrier', [InpostAdminController::class, 'createShipmentCarrierToCarrier'])->name('inpost.createShipmentCarrierToCarrier');
            Route::get('/checkStatusShipmentById/{order}', [InpostAdminController::class, 'checkStatusShipmentById'])->name('inpost.checkStatusShipmentById');
            Route::get('/getLabel/{order}', [InpostAdminController::class, 'getLabel'])->name('inpost.getLabel');
            Route::get('/getLabelByShipmentId/{id}', [InpostAdminController::class, 'getLabelByShipmentId'])->name('inpost.getLabelByShipmentId');
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
            Route::prefix('discount')->group(function () {
                Route::get('/', [DiscountAdminController::class, 'index'])->name('dashboard.shop.discount');
                Route::get('/create', [DiscountAdminController::class, 'create'])->name('dashboard.shop.discount.create');
                Route::post('/store', [DiscountAdminController::class, 'store'])->name('dashboard.shop.discount.store');
                Route::get('/edit/{discount}', [DiscountAdminController::class, 'edit'])->name('dashboard.shop.discount.edit');
                Route::put('/update/{discount}', [DiscountAdminController::class, 'update'])->name('dashboard.shop.discount.update');
                Route::delete('/delete/{id}', [DiscountAdminController::class, 'delete'])->name('dashboard.shop.discount.delete');
            });
            Route::prefix('category')->group(function () {
                Route::get('/', [CategoryAdminController::class, 'index'])->name('dashboard.shop.category');
                Route::get('/create', [CategoryAdminController::class, 'create'])->name('dashboard.shop.category.create');
                Route::post('/store', [CategoryAdminController::class, 'store'])->name('dashboard.shop.category.store');
                Route::get('/edit/{category}', [CategoryAdminController::class, 'edit'])->name('dashboard.shop.category.edit');
                Route::put('/update/{category}', [CategoryAdminController::class, 'update'])->name('dashboard.shop.category.update');
                Route::delete('/delete/{category}', [CategoryAdminController::class, 'delete'])->name('dashboard.shop.category.delete');
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
            Route::prefix('version')->group(function () {
                Route::get('/', function () {
                    return view('admin.technic.version.index');
                })->name('dashboard.technic.version');
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
        Route::prefix('client')->group(function () {
            Route::get('/', [ClientAdminController::class, 'index'])->name('dashboard.client');
        });
    });
});
