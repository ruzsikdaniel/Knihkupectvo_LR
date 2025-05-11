<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\Paginator;
class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(){
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(){
        Paginator::useBootstrap();

        if(app()->environment('local')){
            ini_set('display_startup_errors', '0');
            error_reporting(E_ALL & ~E_NOTICE);
        }
    }
}
