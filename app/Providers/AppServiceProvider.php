<?php

namespace App\Providers;

use App\Models\User;
use App\Observers\GlobalDatabaseCrudObserver;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Event;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Vite;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    protected $modelsToBeLogged = [
        \App\Models\User::class,
        \App\Models\AdminAccessToken::class,
    ];

    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     * @noinspection PhpParamsInspection
     */
    public function boot(): void
    {
        Route::pattern('table_name', '^[a-z_]+$');
        Route::pattern('post', '^(?!create|edit|update|delete)[a-z0-9\-]+$');

        foreach ($this->modelsToBeLogged as $model) {
            $model::observe(GlobalDatabaseCrudObserver::class);
        }

        Gate::define('is-admin', fn(User $user) => $user->isAdmin());
    }
}
