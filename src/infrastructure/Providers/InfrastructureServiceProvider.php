<?php

namespace Infrastructure\Providers;

use Utils\Providers\AbstractRegistrarServiceProvider;

class InfrastructureServiceProvider extends AbstractRegistrarServiceProvider
{
    /**
     * @inheritDoc
     */
    protected function getServiceProviders(): array
    {
        return [
            WorkerServiceProvider::class,
            RouteServiceProvider::class,
        ];
    }
}
