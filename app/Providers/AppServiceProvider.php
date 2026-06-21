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
        if ($this->app->runningInConsole()) {
            return;
        }

        $request = request();
        $forwardedHost = (string) $request->headers->get('X-Forwarded-Host', '');
        $forwardedProto = (string) $request->headers->get('X-Forwarded-Proto', '');

        // Codespaces envia estes headers quando a porta 8081 e publica por HTTPS.
        if (str_contains($forwardedHost, 'github.dev') || $forwardedProto === 'https') {
            URL::forceRootUrl(config('app.url'));
            URL::forceScheme('https');
        }
    }
}
