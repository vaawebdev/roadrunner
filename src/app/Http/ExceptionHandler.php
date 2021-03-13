<?php

namespace App\Http;

use Throwable;
use Psr\Http\Message\ResponseInterface;
use Infrastructure\Http\AbstractExceptionHandler;
use League\Route\Http\Exception\NotFoundException;
use Infrastructure\Http\Contracts\ResponseFactoryInterface;

class ExceptionHandler extends AbstractExceptionHandler
{
    /**
     * @var \Infrastructure\Http\Contracts\ResponseFactoryInterface
     */
    private ResponseFactoryInterface $factory;

    /**
     * @param  \Infrastructure\Http\Contracts\ResponseFactoryInterface $factory
     * @return void
     */
    public function __construct(ResponseFactoryInterface $factory)
    {
        $this->factory = $factory;
    }

    /**
     * @inheritDoc
     */
    protected function handle(Throwable $e): ResponseInterface
    {
        if ($e instanceof NotFoundException) {
            return $this->factory->makeJsonResponse(['payload' => $e->getMessage()], 404);
        }

        return $this->factory->makeJsonResponse(['payload' => $e->getMessage()], 500);
    }
}
