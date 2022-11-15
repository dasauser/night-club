<?php

namespace Dasauser\DancingClub\tests\Unit;

use Dasauser\DancingClub\Customers\Person;
use Dasauser\DancingClub\Dances\HipHop;
use Dasauser\DancingClub\Dances\Rnb;
use Dasauser\DancingClub\Music\ElectroHouse;
use Dasauser\DancingClub\Music\Pop;
use Dasauser\DancingClub\Music\Rnb as RnbMusic;
use Dasauser\DancingClub\NightClub;
use PHPUnit\Framework\TestCase;

class NighClubTest extends TestCase
{
    public function testMusicPlaying(): void
    {
        $electroHouse = new ElectroHouse();

        $club = new NightClub($electroHouse);

        // Пульт диджея точно работает
        $this->assertStringContainsString($electroHouse->getName(), $club->musicPlaying());
    }

    public function testAddCustomer(): void
    {
        // Клуб открылся
        $club = (new NightClub(new Pop()))
            ->addCustomer(Person::createNew('Steve', [new HipHop()]))
            ->addCustomer(Person::createNew('Sveta', [new Rnb()]))
            ->addCustomer(Person::createNew('Vasya', []));

        $peopleActions = $club->customersActions();

        // Все посетители смогли пройти фейс контроль
        $this->assertStringContainsString('Steve', $peopleActions);
        $this->assertStringContainsString('Sveta', $peopleActions);
        $this->assertStringContainsString('Vasya', $peopleActions);
    }

    public function testChangeMusic(): void
    {
        $electroHouse = new ElectroHouse();

        $club = new NightClub($electroHouse);

        // Пульт диджея точно работает
        $this->assertStringContainsString($electroHouse->getName(), $club->musicPlaying());

        // Пульт диджея ТОЧНО работает
        $rnb = new RnbMusic();
        $this->assertStringContainsString($rnb->getName(), $club->changeMusic($rnb)->musicPlaying());
    }

    public function testCustomersActions(): void
    {
        $pop = new Pop();

        $club = new NightClub($pop);

        // Стив пришёл в клуб
        $club->addCustomer(Person::createNew('Steve', [new HipHop()]));
        $this->assertStringContainsString('Steve', $club->customersActions());

        // Играет какая-то попса. Стив направился к бару, чтобы выпить водки
        $this->assertStringContainsString('Vodka', $club->customersActions());

        // Заиграла любимая песня Стива
        $club->changeMusic(new RnbMusic());
        // Стив пустился в пляс
        $this->assertStringNotContainsString('Vodka', $club->customersActions());

        // Заиграл Duft Punk
        $club->changeMusic(new ElectroHouse());
        // Стив не умеет танцевать как робот, и потому снова пошёл пить водку
        $this->assertStringContainsString('Vodka', $club->customersActions());
    }
}