<?php

namespace App\Providers;

use Utils\Providers\AbstractRegistrarServiceProvider;

class AppServiceProvider extends AbstractRegistrarServiceProvider
{
    /**
     * @inheritDoc
     */
    protected function getServiceProviders(): array
    {
        return [
            ExceptionHandlerServiceProvider::class,
            RouteServiceProvider::class,
        ];
    }
}
