<?php

namespace App\Providers;

use App\Category;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191);

        view()->composer(['dashboard.components.dash_left',
                           'products.form',
                           ], function ($view) {
                               $view->with('categories', Category::where('active', 1)->orderBy('category', 'asc')->get());
                           });

        view()->composer(['categories.index',
                                                ], function ($view) {
                                                    $view->with('categories', Category::orderBy('category', 'asc')->get());
                                                });
    }
}
