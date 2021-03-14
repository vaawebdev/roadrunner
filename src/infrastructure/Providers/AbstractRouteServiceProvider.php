<?php

namespace Infrastructure\Providers;

use League\Route\Router;
use League\Container\ServiceProvider\AbstractServiceProvider;
use League\Container\ServiceProvider\BootableServiceProviderInterface;

abstract class AbstractRouteServiceProvider extends AbstractServiceProvider implements BootableServiceProviderInterface
{
    /**
     * Register application routes.
     * @param  \League\Route\Router $router
     * @return void
     */
    abstract protected function registerRoutes(Router $router): void;

    /**
     * @inheritDoc
     */
    final public function boot()
    {
        $this->registerRoutes($this->getContainer()->get(Router::class));
    }

    /**
     * @inheritDoc
     */
    public function register()
    {
        //
    }
}
