<?php

namespace Dasauser\DancingClub\Customers;

use Dasauser\DancingClub\Dances\Dance;
use Dasauser\DancingClub\Drinks\DrinkFactory;

interface Customer
{
    public function canDance(Dance $dance): bool;

    public function goDance(Dance $dance): Customer;

    public function goDrink(DrinkFactory $drinkFactory): Customer;

    public function actionDescription(): string;
}