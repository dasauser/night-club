<?php

namespace Dasauser\DancingClub\Drinks;

interface DrinkFactory
{
    public function getDrink(string $name): Drink;

    public function hasDrink(string $name): bool;
}