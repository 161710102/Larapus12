<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;

use Validator; 
use Hash;


class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Validator::extend('passcheck', function ($attribute, $value, $parameters) { 
            return Hash::check($value, $parameters[0]);
            require base_path() . '/app/Helpers/frontend.php'; 
        });

        schema::defaultStringLength(191);
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
