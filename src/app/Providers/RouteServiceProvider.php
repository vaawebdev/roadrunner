<?php

namespace App\Providers;

use League\Route\Router;
use App\Http\Controllers\HomeController;
use Infrastructure\Providers\AbstractRouteServiceProvider;

class RouteServiceProvider extends AbstractRouteServiceProvider
{
    /**
     * @inheritDoc
     */
    protected function registerRoutes(Router $router): void
    {
        $router->get('/', HomeController::class);
    }
}
