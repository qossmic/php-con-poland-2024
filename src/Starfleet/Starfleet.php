<?php

namespace Workshop\Starfleet;

use Psr\Container\ContainerInterface;
use Workshop\Starfleet\Device\Warp;

class Starfleet implements ContainerInterface
{
    private array $starfleet = [];

    public function set(string $id, string $service)
    {
        $this->starfleet[$id] = $this->make($service);
    }

    public function get(string $id)
    {
        return $this->starfleet[$id];
    }

    public function has(string $id): bool
    {
        return isset($this->starfleet[$id]);
    }

    public function make(string $service)
    {

        $classReflection = new \ReflectionClass($service);

        $constructorParams = $classReflection->getConstructor() ? $classReflection->getConstructor()->getParameters() : [];
        $dependencies = [];

        foreach ($constructorParams as $constructorParam) {
            if(!$constructorParam->getType()?->isBuiltin())
            {
                array_push($dependencies, $this->make($constructorParam->getType()));
            }
        }

        return $classReflection->newInstance(... $dependencies);

    }
}