<?php

namespace Dasauser\DancingClub\Dances;

use Dasauser\DancingClub\WithName;

interface Dance extends WithName
{
    public function getActions(): string;
}