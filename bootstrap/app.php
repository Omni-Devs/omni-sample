<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware): void {
        // Your existing alias (keep it)
        $middleware->alias([
            'redirect.auth' => \App\Http\Middleware\RedirectIfAuthenticatedCustom::class,
        ]);

        $middleware->append(\App\Http\Middleware\SetCurrentBranch::class);

        // Optional: If you want it ONLY on API routes, use this instead:
        // $middleware->api(append: \App\Http\Middleware\EnsureUserBranchIsLoaded::class);
    })
    ->withExceptions(function (Exceptions $exceptions): void {
        //
    })
    ->create();