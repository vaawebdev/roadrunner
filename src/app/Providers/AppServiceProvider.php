<?php

namespace App\Providers;

use Infrastructure\Providers\AbstractRegistrarServiceProvider;

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
