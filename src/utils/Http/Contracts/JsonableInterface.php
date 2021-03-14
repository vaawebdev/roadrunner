<?php

namespace Utils\Http\Contracts;

interface JsonableInterface
{
    /**
     * @return string
     */
    public function toJson(): string;
}
