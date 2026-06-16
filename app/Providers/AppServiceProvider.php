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
        // Build Components for Admin
        Blade::anonymousComponentPath(
            resource_path('views/dashboard/admin/components'),
            'admin'
        );

        Blade::anonymousComponentPath(
            resource_path('views/dashboard/admin/widgets'),
            'admin'
        );

        Blade::anonymousComponentPath(
            resource_path('views/dashboard/admin/partials'),
            'admin'
        );

        // Build Components for Trainer
        Blade::anonymousComponentPath(
            resource_path('views/dashboard/trainer/components'),
            'trainer'
        );

        Blade::anonymousComponentPath(
            resource_path('views/dashboard/trainer/widgets'),
            'trainer'
        );

        Blade::anonymousComponentPath(
            resource_path('views/dashboard/trainer/partials'),
            'trainer'
        );

        // Build Components for Customer
        Blade::anonymousComponentPath(
            resource_path('views/dashboard/customer/components'),
            'customer'
        );

        Blade::anonymousComponentPath(
            resource_path('views/dashboard/customer/widgets'),
            'customer'
        );

        Blade::anonymousComponentPath(
            resource_path('views/dashboard/customer/partials'),
            'customer'
        );
    }
}
