<?php

namespace App\Providers;

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
        view()->composer(['layouts.main', 'admin.layouts.master'], function ($view) {
            $view->with('isAdmin', auth()->check() && auth()->user()->role == 'admin');
        });
    }
}
