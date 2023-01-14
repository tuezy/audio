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
        $this->mergeConfigFrom(app_path('Configs/core.php'), 'core');
        $this->mergeConfigFrom(app_path('Configs/dashboard.php'), 'dashboard');
        $this->loadViewsFrom(resource_path('dashboard'), 'dashboard');
        include app_path('Helpers/functions.php');
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
