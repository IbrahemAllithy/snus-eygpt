<?php

use App\Console\Commands\AvailableQty;
use App\Console\Commands\CurrentValue;
use App\Http\Middleware\Localization;
use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;

// Load environment file based on ENV_FILE variable set in public/index.php
$envFile = $_ENV['ENV_FILE'] ?? $_SERVER['ENV_FILE'] ?? '.env';

return Application::configure(basePath: dirname(__DIR__))
    ->useEnvironmentPath(dirname(__DIR__))
    ->loadEnvironmentFrom($envFile)
    ->withRouting(
        web: __DIR__ . '/../routes/web.php',
        api: __DIR__ . '/../routes/api.php',
        commands: __DIR__ . '/../routes/console.php',
        // channels: __DIR__.'/../routes/channels.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {
        $middleware->appendToGroup('web', [
            \App\Http\Middleware\EncryptCookies::class,
            \Illuminate\Cookie\Middleware\AddQueuedCookiesToResponse::class,
            \Illuminate\Session\Middleware\StartSession::class,
            // \Illuminate\Session\Middleware\AuthenticateSession::class,
            \Illuminate\View\Middleware\ShareErrorsFromSession::class,
            \App\Http\Middleware\VerifyCsrfToken::class,
            \Illuminate\Routing\Middleware\SubstituteBindings::class,
            \App\Http\Middleware\Localization::class,
        ]);

        $middleware->appendToGroup('api', [\Illuminate\Session\Middleware\StartSession::class, \Illuminate\Routing\Middleware\SubstituteBindings::class]);

        $middleware->alias([
            'auth' => \App\Http\Middleware\Authenticate::class,
            'auth.basic' => \Illuminate\Auth\Middleware\AuthenticateWithBasicAuth::class,
            'cache.headers' => \Illuminate\Http\Middleware\SetCacheHeaders::class,
            'can' => \Illuminate\Auth\Middleware\Authorize::class,
            'guest' => \App\Http\Middleware\RedirectIfAuthenticated::class,
            'password.confirm' => \Illuminate\Auth\Middleware\RequirePassword::class,
            'signed' => \Illuminate\Routing\Middleware\ValidateSignature::class,
            'throttle' => \Illuminate\Routing\Middleware\ThrottleRequests::class,
            'verified' => \Illuminate\Auth\Middleware\EnsureEmailIsVerified::class,
            'role' => \App\Http\Middleware\RoleMiddleware::class,
            'checkClientCredentials' => \App\Http\Middleware\AuthenticateClient::class,
            'general' => \App\Http\Middleware\GeneralMiddlwware::class,
            'store' => \App\Http\Middleware\StoreMiddleware::class,
            'scopes' => \Laravel\Passport\Http\Middleware\CheckScopes::class,
            'scope' => \Laravel\Passport\Http\Middleware\CheckForAnyScope::class,
            'installer' => \App\Http\Middleware\Installer::class,
        ]);
        $middleware->redirectGuestsTo(fn() => route('login'));

        // $middleware->redirectUsersTo(RouteServiceProvider::HOME);
        // $middleware->throttleApi();
    })
    ->withExceptions(function (Exceptions $exceptions) {
        //
    })
    ->withCommands([AvailableQty::class, CurrentValue::class])
    ->create();
