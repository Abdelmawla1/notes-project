<?php

namespace Core;

class Container
{
    protected array $bindings = [];

    public function bind($key, $factoryFunction): void
    {
        $this->bindings[$key] = $factoryFunction;
    }

    /**
     * @throws \Exception
     */
    public function resolve($key)
    {
        if(! array_key_exists($key,$this->bindings)){
            throw new \Exception("No matching bindings found for {$key}");
        }
        $factoryFunction = $this->bindings[$key];

        return call_user_func($factoryFunction);
    }

}