<?php

namespace Moathdev\Tap;

use Illuminate\Support\ServiceProvider;

class TapServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {

        $this->mergeConfigFrom(__DIR__.'/config/config.php', 'tap');

        $this->publishes([
            __DIR__.'/config/config.php' => config_path('tap.php'),
        ]);
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return ['tap'];
    }
}