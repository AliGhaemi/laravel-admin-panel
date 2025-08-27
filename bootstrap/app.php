<?php

use App\Http\Middleware\HandleInertiaRequests;
use App\Http\Middleware\IsAdmin;
use Illuminate\Auth\Middleware\Authenticate;
use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
use Illuminate\Routing\Middleware\ThrottleRequests;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware): void {
        $middleware->redirectUsersTo('/admin_panel');
        $middleware->redirectGuestsTo('/register');
        $middleware->web(append: [
            HandleInertiaRequests::class,
            IsAdmin::class,
        ]);
        $middleware->alias([
            'admin' => IsAdmin::class,
        ]);
        $middleware->appendToGroup('auth-admin',[
            Authenticate::class,
            IsAdmin::class,
            ThrottleRequests::with(5,0.1, ''),
        ]);
    })
    ->withExceptions(function (Exceptions $exceptions): void {
        //
    })->create();
