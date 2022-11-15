<?php

namespace Dasauser\DancingClub\Dances;

class Rnb implements Dance
{
    public function getActions(): string
    {
        return 'Много дрыгается; делает сальто; крутится в нижнем броейке';
    }

    public function getName(): string
    {
        return 'R&B';
    }
}