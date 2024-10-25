<?php

error_reporting(E_ALL ^ E_DEPRECATED);

use Workshop\Starfleet\Ships\ExplorationVessel\Galaxy;
use Workshop\Starfleet\StarfleetCommand\StarfleetCommand;

require_once dirname(__DIR__) . '/vendor/autoload.php';

$starfleet = new StarfleetCommand();

$starfleet->register('NCC-1701 D', Galaxy::class,)
    ->addArgument('NCC-1701 D')
    ->addArgument('Enterprise');
$starfleet->register('NCC-71832', Galaxy::class)
    ->addArgument('NCC-71832')
    ->addArgument('Odyssey');



dump($starfleet->get('NCC-71832'));
dump($starfleet);