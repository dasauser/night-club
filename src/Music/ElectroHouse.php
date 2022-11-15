<?php

namespace Dasauser\DancingClub\Music;

use Dasauser\DancingClub\Dances\ElectroDance;
use Dasauser\DancingClub\Dances\House;

class ElectroHouse implements MusicGenre
{
    /**
     * @inheritDoc
     */
    public function getDances(): array
    {
        return [new ElectroDance(), new House()];
    }

    public function getName(): string
    {
        return 'Electro-house';
    }
}