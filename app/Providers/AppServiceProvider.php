<?php

namespace App\Providers;

use App\Models\Company;
use App\Models\ProductImage;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Str;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        View::composer('*', function ($view) {
            $company = Company::get()->pluck('content','type');
            $photos = ProductImage::get();
            if (!Str::startsWith(request()->path(), 'dashboard/')) {
                $view->with('company', $company)->with('photos', $photos);
            }
        });
    }
}
