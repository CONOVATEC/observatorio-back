<?php

namespace App\Providers;

use Illuminate\Pagination\Paginator;
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
        //Para paginación con bootstrap5
        Paginator::useBootstrap();
        //         Paginator::useBootstrapFive();
        // Paginator::useBootstrapFour();
        //Para paginación personalizado con bootstrap5

    }
}