<?php

namespace App\Http\Controllers;

use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Infrastructure\Http\Contracts\ResponseFactoryInterface;

class HomeController
{
    /**
     * @var \Infrastructure\Http\Contracts\ResponseFactoryInterface
     */
    private ResponseFactoryInterface $responseFactory;

    /**
     * @param  \Infrastructure\Http\Contracts\ResponseFactoryInterface $responseFactory
     * @return void
     */
    public function __construct(ResponseFactoryInterface $responseFactory)
    {
        $this->responseFactory = $responseFactory;
    }

    /**
     * @param  \Psr\Http\Message\ServerRequestInterface $request
     * @throws \RuntimeException
     * @return \Psr\Http\Message\ResponseInterface
     */
    public function __invoke(ServerRequestInterface $request): ResponseInterface
    {
        return $this->responseFactory->makeJsonResponse(['payload' => 'Hello World']);
    }
}
