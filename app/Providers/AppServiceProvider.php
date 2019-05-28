<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
USE Illuminate\Support\Facades\schema;
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
         //
        schema::defaultStringLength(191);
    }
}
