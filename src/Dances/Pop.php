<?php

namespace Dasauser\DancingClub\Dances;

class Pop implements Dance
{
    public function getActions(): string
    {
        return 'goat simulator dance';
    }

    public function getName(): string
    {
        return 'Pop music dance';
    }
}