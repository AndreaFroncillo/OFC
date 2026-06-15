<?php

namespace App\Providers;

use Carbon\Carbon;
use Illuminate\Support\Facades\App;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Blade;

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
        Blade::anonymousComponentPath(
            resource_path('views/dashboard/admin/components'),
            'admin'
        );

        Blade::anonymousComponentPath(
            resource_path('views/dashboard/customer/components'),
            'customer'
        );

        Blade::anonymousComponentPath(
            resource_path('views/dashboard/trainer/components'),
            'trainer'
        );
    }
}
