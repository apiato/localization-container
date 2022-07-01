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
     * Container Service Providers.
     */
    public array $serviceProviders = [
        LocalizationServiceProvider::class,
        MiddlewareServiceProvider::class,
    ];

    /**
     * Container Aliases
     */
    public array $aliases = [

    ];
}
