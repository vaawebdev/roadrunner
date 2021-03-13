<?php

namespace Infrastructure\Http\Contracts;

interface JsonableInterface
{
    /**
     * @return string
     */
    public function toJson(): string;
}
