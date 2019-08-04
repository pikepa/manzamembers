<?php

namespace App\Providers;

use App\Category;
use Illuminate\Support\Facades\URL;
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
        URL::forceScheme('https');


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
                $view->with('tickettypes', Category::orderBy('type', 'asc')
                            ->where('type','PRI')
                            ->orderBy('category', 'asc')->get());
            });

        view()->composer(['memberships.edit_form',
            ], function ($view) {
                $view->with('memb_types', Category::orderBy('type', 'asc')
                            ->where('type','MEM')
                            ->orderBy('category', 'asc')->get());
            });
        view()->composer(['memberships.edit_form',
                          'receipts.create'
            ], function ($view) {
                $view->with('memb_terms', Category::orderBy('type', 'asc')
                            ->where('type','TRM')
                            ->orderBy('category', 'asc')->get());
            });
    }
}
