<?php

namespace Dasauser\DancingClub\Drinks;

abstract class BaseDrink implements Drink
{
    public function getName(): string
    {
        return (new \ReflectionClass($this))->getShortName();
    }
}