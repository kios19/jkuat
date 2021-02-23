<?php

namespace App\Providers;

use App\EventType;
use App\Location;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Schema;

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
        
        View::composer('*', function ($view) {
            $view->with('globalLocations', Location::all());
            $view->with('globalEventTypes', EventType::all());
        });
    }
}
