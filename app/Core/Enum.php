<?php

namespace CS\Core;

use ReflectionClass;

abstract class Enum
{
    public static function toArray()
    {
        $reflectionClass = new ReflectionClass(static::class);
        return $reflectionClass->getConstants();
    }
}