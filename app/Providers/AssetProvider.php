<?php

namespace App\Providers;

use Illuminate\Support\Facades\Vite;
use Illuminate\Support\ServiceProvider;

class AssetProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        Vite::macro('svgs', fn (string $asset) => $this->asset("resources/images/svgs/{$asset}"));
        Vite::macro('pngs', fn (string $asset) => $this->asset("resources/images/pngs/{$asset}"));
        Vite::macro('jpgs', fn (string $asset) => $this->asset("resources/images/jpgs/{$asset}"));
        Vite::macro('index', fn (string $asset) => $this->asset("resources/images/{$asset}"));
    }
}
