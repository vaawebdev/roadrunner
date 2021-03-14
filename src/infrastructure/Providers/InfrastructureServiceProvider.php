<?php

namespace Infrastructure\Providers;

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
