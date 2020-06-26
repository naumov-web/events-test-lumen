<?php

namespace App\Providers;

use App\Models\User;
use mmghv\LumenRouteBinding\RouteBindingServiceProvider as BaseServiceProvider;

/**
 * Class RouteBindingServiceProvider
 * @package App\Providers
 */
class RouteBindingServiceProvider extends BaseServiceProvider
{
    /**
     * Boot the service provider
     */
    public function boot()
    {
        // The binder instance
        $binder = $this->binder;

        $binder->bind('user', User::class);
    }
}
