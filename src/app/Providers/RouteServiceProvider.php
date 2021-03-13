<?php

namespace App\Providers;

use League\Route\Router;
use App\Http\ExceptionHandler;
use League\Container\Container;
use App\Http\Controllers\HomeController;
use Infrastructure\Http\AbstractExceptionHandler;
use Infrastructure\Http\Contracts\ResponseFactoryInterface;
use League\Container\ServiceProvider\AbstractServiceProvider;

class RouteServiceProvider extends AbstractServiceProvider
{
    /**
     * @var array
     */
    protected $provides = [
        Router::class,
        AbstractExceptionHandler::class,
    ];

    /**
     * @inheritDoc
     */
    public function register()
    {
        $container = $this->getContainer();

        if ($container instanceof Container) {
            $container
                ->share(AbstractExceptionHandler::class, ExceptionHandler::class)
                ->addArgument(ResponseFactoryInterface::class);

            $container->extend(Router::class)->addMethodCalls([
                'map' => ['GET', '/', HomeController::class],
            ]);
        }
    }
}
