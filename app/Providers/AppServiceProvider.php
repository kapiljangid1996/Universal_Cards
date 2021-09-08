<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

Use View;
use App\Models\Site;

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
        //Site Settings
        $settings = Site::first();
        View::share('settings', $settings);
    }
}
