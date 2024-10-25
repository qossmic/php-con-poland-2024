<?php


namespace Workshop\Starfleet\Ships\ExplorationVessel;


use Workshop\Starfleet\Device\Warp;
use Workshop\Starfleet\Ships\Starship;

class Galaxy implements Starship
{
    public function __construct(
        public string $name,
        public string $registration,
        public Warp $warp
    )
    {

    }

    public function getRegistration(): string
    {
        return $this->registration;
    }

    public function getName(): string
    {
       return $this->name;
    }
}