<?php

namespace App\Containers\Vendor\Localization\Providers;

use App\Ship\Parents\Providers\MainServiceProvider as ParentMainServiceProvider;

/**
 * Class MainServiceProvider.
 *
 * The Main Service Provider of this container, it will be automatically registered in the framework.
 */
class MainServiceProvider extends ParentMainServiceProvider
{
    /**
     * Container Aliases
     */
    public array $aliases = [

    ];

    public function __construct(
        /**
         * Container Service Providers.
         */
        public array &$serviceProviders = [
            LocalizationServiceProvider::class,
        ]) {
        if (config('vendor-localization.localization_enabled')) {
            $serviceProviders[] = MiddlewareServiceProvider::class;
        }
    }
}
