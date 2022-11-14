<?php

namespace Dasauser\DancingClub;

use Dasauser\DancingClub\Customers\Customer;
use Dasauser\DancingClub\Music\MusicGenre;

class NightClub
{
    public function whatPeopleDo(): string
    {
    }

    public function musicPlaying(): string
    {
    }

    public function changeMusic(MusicGenre $music): NightClub
    {
    }

    public function addCustomer(Customer $customer): void
    {

    }
}