<?php

namespace Infrastructure\Http;

use Closure;
use Throwable;
use Psr\Http\Message\ResponseInterface;

abstract class AbstractExceptionHandler
{
    /**
     * @param  \Throwable                            $e
     * @return \Psr\Http\Message\ResponseInterface
     */
    abstract protected function handle(Throwable $e): ResponseInterface;

    /**
     * @return \Closure
     */
    final public function getHandler(): Closure
    {
        return fn(Throwable $e) => $this->handle($e);
    }
}
