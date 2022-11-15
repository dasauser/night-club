<?php

namespace Dasauser\DancingClub\Music;

use Dasauser\DancingClub\Dances\Pop as PopMusicDance;

class Pop implements MusicGenre
{
    /**
     * @inheritDoc
     */
    public function getDances(): array
    {
        return [new PopMusicDance()];
    }

    public function getName(): string
    {
        return 'Pop Music';
    }
}