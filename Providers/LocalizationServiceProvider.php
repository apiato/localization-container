<?php

namespace App\Containers\Vendor\Localization\Providers;

use Illuminate\Support\ServiceProvider;

class LocalizationServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     */
    public function boot(): void
    {
        $this->publishes([
            __DIR__ . '/../Configs/vendor-localization.php' => app_path('Ship/Configs/vendor-localization.php'),
        ]);
    }

    /**
     * Register the application services.
     */
    public function register(): void
    {
        $this->mergeConfigFrom(
            __DIR__ . '/../Configs/vendor-localization.php', 'vendor-localization'
        );
    }
}
