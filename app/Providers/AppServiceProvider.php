<?php

namespace App\Providers;

use Carbon\Carbon;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\URL;
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
        if ($this->app->environment('production')) {
            URL::forceScheme('https');
        }
        // Para fechas con Carbon en español
        Carbon::setLocale(config('app.locale'));
        setlocale(LC_ALL, 'es_PE', 'es', 'ES', 'es_PE.utf8');

        // Carbon::setLocale('es');
        //Para paginación con bootstrap5
        Paginator::useBootstrap();
        //         Paginator::useBootstrapFive();
        // Paginator::useBootstrapFour();
        //Para paginación personalizado con bootstrap5

    }
}
