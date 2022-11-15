<?php

require_once 'vendor/autoload.php';

use Dasauser\DancingClub\Customers\Person;
use Dasauser\DancingClub\Dances\ElectroDance;
use Dasauser\DancingClub\Dances\HipHop;
use Dasauser\DancingClub\Dances\House;
use Dasauser\DancingClub\Dances\Pop;
use Dasauser\DancingClub\Dances\Rnb;
use Dasauser\DancingClub\Music\Pop as PopMusic;
use Dasauser\DancingClub\Music\Rnb as RnbMusic;
use Dasauser\DancingClub\NightClub;

$club = (new NightClub(new PopMusic()))
    ->addCustomer(Person::createNew('Steve', [new Pop(), new ElectroDance()]))
    ->addCustomer(Person::createNew('Sveta', [new Pop()]))
    ->addCustomer(Person::createNew('Marie', [new Rnb()]))
    ->addCustomer(Person::createNew('Emma', []))
    ->addCustomer(Person::createNew('Harold', [new House()]))
    ->addCustomer(Person::createNew('Richard', [new HipHop()]));

show($club->musicPlaying() . PHP_EOL);
show($club->customersActions());

$club->changeMusic(new RnbMusic());

show($club->musicPlaying() . PHP_EOL);
show($club->customersActions());

function show(string $string): void {
    echo PHP_SAPI === 'cli' ? $string : nl2br($string);
}