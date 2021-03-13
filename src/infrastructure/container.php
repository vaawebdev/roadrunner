<?php

use League\Container\Container;
use League\Container\ReflectionContainer;
use Infrastructure\Providers\RouteServiceProvider;
use Infrastructure\Providers\WorkerServiceProvider;

return (new Container())
    ->delegate(new ReflectionContainer)
    ->addServiceProvider(WorkerServiceProvider::class)
    ->addServiceProvider(RouteServiceProvider::class);
