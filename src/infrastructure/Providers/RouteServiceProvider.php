<?php

namespace Infrastructure\Providers;

use League\Route\Router;
use League\Container\Container;
use Infrastructure\Http\ResponseFactory;
use League\Route\Strategy\ApplicationStrategy;
use Infrastructure\Http\Contracts\ResponseFactoryInterface;
use League\Container\ServiceProvider\AbstractServiceProvider;

class RouteServiceProvider extends AbstractServiceProvider
{
    /**
     * @var array
     */
    protected $provides = [
        Router::class,
        ApplicationStrategy::class,
        ResponseFactoryInterface::class,
    ];

    /**
     * @inheritDoc
     */
    public function register()
    {
        $container = $this->getContainer();

        if ($container instanceof Container) {
            $container
                ->share(ApplicationStrategy::class)
                ->addMethodCall('setContainer', [$container])
                ->setShared(true);

            $container
                ->share(Router::class)
                ->addMethodCall('setStrategy', [ApplicationStrategy::class]);

            $container->share(ResponseFactoryInterface::class, ResponseFactory::class);
        }
    }
}
