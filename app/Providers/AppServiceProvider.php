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
                           'events.form',
                           ], function ($view) {
                               $view->with('categories', Category::where('active', 1)
                                           ->where('type','EVT')
                                           ->orderBy('category', 'asc')->get());
                           });

        view()->composer(['categories.index',
            ], function ($view) {
                $view->with('categories', Category::orderBy('type', 'asc')
                            ->orderBy('category', 'asc')->get());
            });

        view()->composer(['priceitems.form',
            ], function ($view) {
                $view->with('categories', Category::orderBy('type', 'asc')
                            ->where('type','PRI')
                            ->orderBy('category', 'asc')->get());
            });
    }
}
