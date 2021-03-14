<?php

namespace Infrastructure\Http;

use Nyholm\Psr7\Factory\Psr17Factory;
use Psr\Http\Message\ResponseInterface;
use Utils\Http\Contracts\JsonableInterface;
use Utils\Http\Contracts\ResponseFactoryInterface;

class ResponseFactory implements ResponseFactoryInterface
{
    /**
     * @var \Nyholm\Psr7\Factory\Psr17Factory
     */
    private $responseFactory;

    /**
     * @return void
     */
    public function __construct()
    {
        $this->responseFactory = new Psr17Factory;
    }

    /**
     * @inheritDoc
     */
    public function makeJsonResponse($payload, int $statusCode = 200): ResponseInterface
    {
        $response = $this->responseFactory
            ->createResponse($statusCode)
            ->withHeader('content-type', 'application/json');

        $body = $response->getBody();

        if ($body->isWritable()) {
            $body->write($payload instanceof JsonableInterface ? $payload->toJson() : json_encode($payload));
        }

        return $response;
    }
}
