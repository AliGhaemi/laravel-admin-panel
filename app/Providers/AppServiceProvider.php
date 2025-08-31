<?php

namespace App\Providers;

use App\Observers\GlobalDatabaseCrudObserver;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Event;
use Illuminate\Support\Facades\Route;
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
     */
    public function boot(): void
    {
        Route::pattern('table_name', '^[a-z_]+$');

        foreach ($this->modelsToBeLogged as $model) {
            $model::observe(GlobalDatabaseCrudObserver::class);
        }

    }
}
