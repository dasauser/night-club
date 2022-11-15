<?php

namespace Dasauser\DancingClub\Customers;

use Dasauser\DancingClub\Dances\Dance;
use Dasauser\DancingClub\Drinks\Drink;
use Dasauser\DancingClub\Drinks\DrinkFactory;
use Dasauser\DancingClub\Drinks\Vodka;

/**
 * Базовая реализация самого обычного посетителя, без каких-либо установок/ограничений:
 * умеет что-то танцевать и спокойно пьёт водку
 */
class Person implements Customer
{
    private string $personName;

    /** @var Dance[] */
    private array $danceAbilities = [];

    private string $actionDescription = 'Ожидает начала экшена';

    public function __construct(string $personName)
    {
        $this->personName = $personName;
    }

    /**
     * Фабричный метод создания посетителей
     *
     * @param string $name Имя посетителя
     * @param Dance[] $dances Какие танцы знает посетитель
     *
     * @return Customer Объект посетителя
     */
    public static function createNew(string $name, array $dances = []): Customer
    {
        $person = new Person($name);
        array_walk($dances, fn(Dance $dance) => $person->addDanceAbility($dance));
        return $person;
    }

    public function getPersonName(): string
    {
        return $this->personName;
    }

    public function addDanceAbility(Dance $dance): void
    {
        $this->danceAbilities[$dance::class] = $dance;
    }

    public function canDance(Dance $dance): bool
    {
        return isset($this->danceAbilities[$dance::class]);
    }

    public function goDance(Dance $dance): Customer
    {
        $this->actionDescription = $dance->getActions();

        return $this;
    }

    public function goDrink(DrinkFactory $drinkFactory): Customer
    {
        $drinkName = $this->getWantDrink()->getName();

        if ($drinkFactory->hasDrink($drinkName)) {
            $this->actionDescription = "Пьёт {$drinkFactory->getDrink($drinkName)->getName()}";
        } else {
            $this->actionDescription = 'Курит';
        }

        return $this;
    }

    public function actionDescription(): string
    {
        return "{$this->getPersonName()}: $this->actionDescription";
    }

    private function getWantDrink(): Drink
    {
        return new Vodka();
    }
}