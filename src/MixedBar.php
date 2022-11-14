<?php

namespace Dasauser\DancingClub;

use Dasauser\DancingClub\Drinks\Drink;
use Dasauser\DancingClub\Drinks\Vodka;
use Dasauser\DancingClub\Drinks\Whiskey;
use Dasauser\DancingClub\Drinks\Wine;

class MixedBar implements Drinks\DrinkFactory
{
    private array $drinks;

    public function __construct()
    {
        $this->drinks = ['Whiskey' => new Whiskey(), 'Wine' => new Wine(), 'Vodka' => new Vodka()];
    }

    public function getDrink(string $name): Drink
    {
        return $this->drinks[$name];
    }

    public function hasDrink(string $name): bool
    {
        return isset($this->drinks[$name]);
    }
}