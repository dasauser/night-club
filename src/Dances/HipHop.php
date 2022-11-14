<?php

namespace Dasauser\DancingClub\Dances;

class HipHop implements Dance
{
    public function getActions(): string
    {
        return 'Покачивает телом вперед-назад; ноги в полу-присяде; руки согнуты в локтях; трясёт головой вперед-назад';
    }

    public function getName(): string
    {
        return 'Hip-Hop';
    }
}