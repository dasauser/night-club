<?php

namespace Dasauser\DancingClub\Dances;

class House implements Dance
{
    public function getActions(): string
    {
        return 'Машет руками; плавно перебирает ногами, немного передвигаясь из стороны в сторону';
    }

    public function getName(): string
    {
        return 'House';
    }
}