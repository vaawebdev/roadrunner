<?php

namespace Utils\Providers;

use League\Container\Container;
use League\Container\ServiceProvider\AbstractServiceProvider;
use League\Container\ServiceProvider\BootableServiceProviderInterface;

abstract class AbstractRegistrarServiceProvider extends AbstractServiceProvider implements BootableServiceProviderInterface
{
    /**
     * Get application service providers.
     * @return array
     */
    abstract protected function getServiceProviders(): array;

    /**
     * @inheritDoc
     */
    final public function boot()
    {
        $container = $this->getContainer();

        if ($container instanceof Container) {
            foreach ($this->getServiceProviders() as $provider) {
                $container->addServiceProvider($provider);
            }
        }
    }

    /**
     * @inheritDoc
     */
    final public function register()
    {
        //
    }
}
