<?php

use Workshop\Starfleet\Ships\ExplorationVessel\Galaxy;
use Workshop\Starfleet\Ships\ExplorationVessel\Intrepid;

error_reporting(E_ALL ^ E_DEPRECATED);

require_once dirname(__DIR__) . '/vendor/autoload.php';

$starfleet = new Workshop\Starfleet\Starfleet();
$starfleet->set('NCC 1701 D', Galaxy::class, ['Enterprise', 'NCC-1701 D']);
$starfleet->set('NCC 1701 E', Galaxy::class, ['Enterprise', 'NCC-1701 E']);
$starfleet->set('NCC 1701 F', Galaxy::class, ['Enterprise', 'NCC-1701 F']);
$starfleet->set('NX-01', Intrepid::class);


dd($starfleet);