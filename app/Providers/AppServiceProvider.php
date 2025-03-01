<?php

namespace App\Providers;

use App\Models\Forum_edition;
use App\Models\Setting;
use Illuminate\Support\ServiceProvider;

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
        view()->share('years', Forum_edition::getAllYears());
        view()->share('setting', Setting::getAllSettings());
    }
}
