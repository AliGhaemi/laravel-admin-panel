<?php

use App\Console\Commands\DeleteAdminAccessToken;
use App\Http\Middleware\HandleInertiaRequests;
use App\Http\Middleware\IsAdmin;
use Illuminate\Auth\Middleware\Authenticate;
use Illuminate\Console\Scheduling\Schedule;
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
//            IsAdmin::class,
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
    ->withSchedule(function (Schedule $schedule) {
        // If statement to be stated here would make sense,
        // Otherwise, the callback event is going to be called every 10 seconds
        // Even tho it did its job for example here deleting the token
        // It would keep trying to delete the token even tho there is no row with a token in it.
        // TODO: Find out if there is a better way to do this, maybe search conditional scheduling laravel / cron
        $schedule->call(new DeleteAdminAccessToken)->everyTenSeconds();
    })
    ->withExceptions(function (Exceptions $exceptions): void {
        //
    })->create();
