<?php

namespace App\Providers;

use App\Http\ExceptionHandler;
use League\Container\Container;
use Infrastructure\Http\AbstractExceptionHandler;
use League\Container\ServiceProvider\AbstractServiceProvider;
use League\Container\ServiceProvider\BootableServiceProviderInterface;

class ExceptionHandlerServiceProvider extends AbstractServiceProvider implements BootableServiceProviderInterface
{
    /**
     * @inheritDoc
     */
    public function boot()
    {
        $container = $this->getContainer();

        if ($container instanceof Container) {
            $container
                ->share(AbstractExceptionHandler::class, $container->get(ExceptionHandler::class));
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
