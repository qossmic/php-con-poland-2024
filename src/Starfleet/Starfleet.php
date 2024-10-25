<?php

namespace Workshop\Starfleet;

use Psr\Container\ContainerInterface;
use Workshop\Starfleet\Device\Warp;

class Starfleet implements ContainerInterface
{
    private array $starfleet = [];

    public function set(string $id, string $service, array $config = [])
    {
        $this->starfleet[$id] = $this->make($service, $config);
    }

    public function get(string $id)
    {
        return $this->starfleet[$id];
    }

    public function has(string $id): bool
    {
        return isset($this->starfleet[$id]);
    }

    public function make(string $service, array $config = [])
    {

        $classReflection = new \ReflectionClass($service);

        $constructorParams = $classReflection->getConstructor() ? $classReflection->getConstructor()->getParameters() : [];
        $dependencies = [];

        $i = 0;
        foreach ($constructorParams as $constructorParam) {
            if (!$constructorParam->getType()?->isBuiltin()) {
                if (!$this->has($constructorParam->getType()?->getName())) {
                    $this->set($constructorParam->getType()?->getName(), $constructorParam->getType()?->getName(), []);
                }
                array_push($dependencies, $this->get($constructorParam->getType()?->getName()));
            } else {
                array_push($dependencies, $config[$i]);
            }
            $i++;
        }

        return $classReflection->newInstance(... $dependencies);

    }
}