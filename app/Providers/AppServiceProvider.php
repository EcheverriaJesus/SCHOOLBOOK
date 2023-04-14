<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Carbon\Carbon;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //setlocale(LC_TIME, 'es_MX.utf8');
        setlocale(LC_TIME, 'Spanish');
        Carbon::setLocale('es');
        Carbon::setUtf8(true);
    }
}
