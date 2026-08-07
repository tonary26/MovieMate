<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Cache\RateLimiting\Limit;
use Illuminate\Http\Request;

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
        RateLimiter::for('api', function (Request $request) {
            Limit::perMinute(30)->by($request?->user() ?? $request->ip())->response(function (Request $request, array $headers) {
                response()->json([
                    'message' => 'Too many attempts. Please try again later.'
                ], 402)->withHeaders($headers);
            });
        });
    }
}
