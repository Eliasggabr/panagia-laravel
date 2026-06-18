<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\URL;

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
        // If not local or we detect the Codespaces forwarded host, force https scheme.
        $forwardedHost = (string) request()->header('X-Forwarded-Host');
        if (env('APP_ENV') !== 'local' || str_contains($forwardedHost, 'github.dev')) {
            \URL::forceScheme('https');
        }
    }
}