<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;

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
        view()->composer('input', function ($view) {
            $view->with(
                'years',
                array_reverse(range(today()->year - 100, today()->year))
            );
            $view->with(
                'months',
                range(1, 12)
            );
        });
    }
}
