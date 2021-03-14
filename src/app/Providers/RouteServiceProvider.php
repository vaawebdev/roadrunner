<?php

namespace App\Providers;

use League\Route\Router;
use App\Http\Controllers\HomeController;
use Utils\Providers\AbstractRouteServiceProvider;

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
