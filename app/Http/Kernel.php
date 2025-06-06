<?php

namespace App\Http;

use Illuminate\Foundation\Http\Kernel as HttpKernel;

class Kernel extends HttpKernel
{
    /**
     * Middleware global yang dijalankan di setiap request HTTP.
     */
    protected $middleware = [
        \App\Http\Middleware\SecureHeaders::class, // ✅ Custom middleware untuk header keamanan
        \Illuminate\Foundation\Http\Middleware\HandlePrecognitiveRequests::class,
    ];

    /**
     * Grup middleware untuk web dan API.
     */
    protected $middlewareGroups = [
        'web' => [
            \App\Http\Middleware\EncryptCookies::class,
            \Illuminate\Cookie\Middleware\AddQueuedCookiesToResponse::class,
            \Illuminate\Session\Middleware\StartSession::class,
            \Illuminate\View\Middleware\ShareErrorsFromSession::class,
            \App\Http\Middleware\VerifyCsrfToken::class,
            \Illuminate\Routing\Middleware\SubstituteBindings::class,
        ],

        'api' => [
            \Laravel\Sanctum\Http\Middleware\EnsureFrontendRequestsAreStateful::class,
            \Illuminate\Routing\Middleware\ThrottleRequests::class,
            \Illuminate\Routing\Middleware\SubstituteBindings::class,
        ],
    ];

    /**
     * Middleware khusus yang bisa dipanggil per-route.
     */
    protected $routeMiddleware = [
        'auth' => \App\Http\Middleware\Authenticate::class,      // Default auth Laravel
        'admin' => \App\Http\Middleware\AdminMiddleware::class,  // Role admin
        'user' => \App\Http\Middleware\UserMiddleware::class,    // Role user
        'secure.headers' => \App\Http\Middleware\SecureHeaders::class, // Custom header (opsional route use)
    ];
}
