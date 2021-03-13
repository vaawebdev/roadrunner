<?php

namespace App\Providers;

use League\Container\Container;
use League\Container\ServiceProvider\AbstractServiceProvider;
use League\Container\ServiceProvider\BootableServiceProviderInterface;

class AppServiceProvider extends AbstractServiceProvider implements BootableServiceProviderInterface
{
    /**
     * @var array
     */
    private $providers = [
        RouteServiceProvider::class,
    ];

    /**
     * @inheritDoc
     */
    public function boot()
    {
        $container = $this->getContainer();

        if ($container instanceof Container) {
            foreach ($this->providers as $provider) {
                $container->addServiceProvider($provider);
            }
        }
    }

    /**
     * @inheritDoc
     */
    public function register()
    {
        //
    }
}
