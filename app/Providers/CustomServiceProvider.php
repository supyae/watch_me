<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class CustomServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind('App\Repositories\Location\LocationRepositoryInterface',
            'App\Repositories\Location\CityRepository');

        $this->app->bind('App\Repositories\Location\LocationRepositoryInterface',
            'App\Repositories\Location\TownshipRepository');

    }
}
