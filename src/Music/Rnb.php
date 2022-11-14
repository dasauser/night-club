<?php

namespace Dasauser\DancingClub\Music;

use Dasauser\DancingClub\Dances\HipHop;
use Dasauser\DancingClub\Dances\Rnb as RnbDance;

class Rnb implements MusicGenre
{
    /**
     * @inheritDoc
     */
    public function getDances(): array
    {
        return [new HipHop(), new RnbDance()];
    }

    public function getName(): string
    {
        return 'R&B';
    }
}