<?php

declare (strict_types = 1);

use League\Route\Router;
use Spiral\RoadRunner\PSR7Client;
use App\Providers\AppServiceProvider;
use Infrastructure\Http\AbstractExceptionHandler;
use Infrastructure\Providers\InfrastructureServiceProvider;

ini_set('display_errors', 'stderr');

include 'vendor/autoload.php';

/**
 * @var \League\Container\Container
 */
$container = require 'src/infrastructure/container.php';

$container
    ->addServiceProvider(InfrastructureServiceProvider::class)
    ->addServiceProvider(AppServiceProvider::class);

/**
 * @var \Spiral\RoadRunner\PSR7Client
 */
$psr7 = $container->get(PSR7Client::class);

/**
 * @var \League\Route\Router
 */
$router = $container->get(Router::class);

/**
 * @var \Infrastructure\Http\AbstractExceptionHandler
 */
$exceptionHandler = $container->get(AbstractExceptionHandler::class)->getHandler();

while ($req = $psr7->acceptRequest()) {
    try {
        $psr7->respond($router->dispatch($req));
    } catch (Throwable $e) {
        $psr7->respond($exceptionHandler($e));
    }
}
