<?php

namespace DivineOmega\LaravelMultipleChoice\Providers;

use Illuminate\Support\ServiceProvider;

class LMCServiceProvider extends ServiceProvider
{

    /**
    * Perform post-registration booting of services.
    *
    * @return void
    */
    public function boot()
    {
        $this->publishes([
            __DIR__.'/../Database/Migrations/' => database_path('migrations')
        ], 'migrations');
    }

    /**
    * Register bindings in the container.
    *
    * @return void
    */
    public function register()
    {
        
    }
}