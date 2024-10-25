<?php


namespace Workshop\Starfleet\Ships\ExplorationVessel;


use Workshop\Starfleet\Device\Warp;
use Workshop\Starfleet\Ships\Starship;

class Galaxy
{
    public function __construct(public Warp $warp)
    {

    }

}