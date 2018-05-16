<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use App\Models\Category;
use App\Models\Product;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191);
        view()->composer(['layouts.user.categorylist', 'home'], function($view) {
            $view->with('parents', Category::parents());
            $view->with('categories', Category::categories());
            $view->with('products', Product::getProducts());
        });
        // view()->composer('layouts.products.productlist')
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
