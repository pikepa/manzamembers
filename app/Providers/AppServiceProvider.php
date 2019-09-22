<?php

namespace App\Providers;

use App\Event;
use App\Category;
use App\Invitation;
use Laravel\Horizon\Horizon;
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
        
        Horizon::auth(function ($request) {
            // Always show admin if local development
            if (env('APP_ENV') == 'local') {
                return true;
            }
        });

        view()->composer(['dashboard.components.dash_left',
                           'events.form',
                           ], function ($view) {
                               $view->with('categories', Category::where('active', 1)
                                           ->where('type','EVT')
                                           ->orderBy('category', 'asc')->get());
                           });


        view()->composer(['dashboard.components.dash_left',
                           ], function ($view) {
                               $view->with('eventswithbookings', Event::active()
                                           ->has('bookings', '>', 0)
                                           ->get());
                           });

        view()->composer(['dashboard.components.dash_left',
                           ], function ($view) {
                               $view->with('eventswithreservations', Event::active()
                                           ->has('reservations', '>', 0)
                                           ->get());
                           });

        view()->composer(['categories.index',
            ], function ($view) {
                $view->with('categories', Category::orderBy('type', 'asc')
                            ->orderBy('category', 'asc')->get());
            });

        view()->composer(['priceitems.form', 'bookings.form',
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
                          'receipts.form'
            ], function ($view) {
                $view->with('memb_terms', Category::orderBy('type', 'asc')
                            ->where('type','TRM')
                            ->orderBy('category', 'asc')->get());
            });  

        view()->composer(['users.index',
            ], function ($view) {
                $view->with('invitations', Invitation::orderBy('created_at', 'desc')
                            ->get());
            });


    }
}
