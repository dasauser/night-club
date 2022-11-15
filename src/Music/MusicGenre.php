<?php

namespace Dasauser\DancingClub\Music;

use Dasauser\DancingClub\Dances\Dance;
use Dasauser\DancingClub\WithName;

interface MusicGenre extends WithName
{
    /**
     * @return Dance[]
     */
    public function getDances(): array;
}