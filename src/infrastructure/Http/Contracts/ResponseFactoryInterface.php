<?php

namespace Infrastructure\Http\Contracts;

use Psr\Http\Message\ResponseInterface;

interface ResponseFactoryInterface
{
    /**
     * @param  mixed|\Infrastructure\Http\JsonableInterface $payload
     * @param  int                                          $statusCode
     * @return \Psr\Http\Message\ResponseInterface
     */
    public function makeJsonResponse($payload, int $statusCode = 200): ResponseInterface;
}
