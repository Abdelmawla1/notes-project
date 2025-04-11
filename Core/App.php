<?php

namespace Core;

class App
{
    protected static mixed $container;

    public static function setContainer($container): void
    {
        static::$container = $container;
    }

    public static function getContainer()
    {
        return static::$container;
    }

    public static function bind($key, $factoryFunction): void
    {
        static::getContainer()->bind($key,$factoryFunction);
    }

    public static function resolve($key)
    {
        return static::getContainer()->resolve($key);
    }

}