<?php

namespace Infrastructure\Providers;

use Spiral\RoadRunner\Worker;
use League\Container\Container;
use Spiral\Goridge\StreamRelay;
use Spiral\RoadRunner\PSR7Client;
use Nyholm\Psr7\Factory\Psr17Factory;
use League\Container\ServiceProvider\AbstractServiceProvider;

class WorkerServiceProvider extends AbstractServiceProvider
{
    /**
     * @var array
     */
    protected $provides = [
        Worker::class,
        Psr17Factory::class,
        PSR7Client::class,
    ];

    /**
     * @inheritDoc
     */
    public function register()
    {
        $container = $this->getContainer();

        if ($container instanceof Container) {
            $container
                ->share(StreamRelay::class)
                ->addArguments([STDIN, STDOUT]);

            $container
                ->share(Worker::class)
                ->addArguments([StreamRelay::class]);

            $container
                ->share(Psr17Factory::class);

            $container
                ->share(PSR7Client::class)
                ->addArguments([Worker::class, Psr17Factory::class, Psr17Factory::class, Psr17Factory::class]);
        }
    }
}
