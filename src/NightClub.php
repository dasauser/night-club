<?php

namespace Dasauser\DancingClub;

use Dasauser\DancingClub\Customers\Customer;
use Dasauser\DancingClub\Music\MusicGenre;

/**
 * Эмуляция ночного клуба, где либо танцуют, либо пьют водку в баре
 */
class NightClub
{
    /** @var Customer[] */
    private array $customers = [];

    public function __construct(
        private MusicGenre $music,
        private readonly MixedBar $bar = new MixedBar(),
    ) {
    }

    /**
     * Добавляет в клуб нового посетителя
     */
    public function addCustomer(Customer $customer): NightClub
    {
        $this->customers[spl_object_hash($customer)] ??= $customer;
        $this->updateCustomersBehavior([$customer]);
        return $this;
    }

    /**
     * Возвращает жанр музыки, который проигрывается сейчас
     */
    public function musicPlaying(): string
    {
        return 'Сейчас играет ' . $this->music->getName();
    }

    /**
     * Возвращает описание действий каждого посетителя клуба
     */
    public function customersActions(): string
    {
        $actions = array_map(
            fn(Customer $c) => $c->actionDescription(),
            $this->customers
        );

        return implode(PHP_EOL, $actions) . PHP_EOL;
    }

    /**
     * Меняет музыку в клубе, после чего меняется поведение посетителей
     */
    public function changeMusic(MusicGenre $music): NightClub
    {
        $this->music = $music;

        $this->updateCustomersBehavior($this->customers);

        return $this;
    }

    /**
     * @param Customer[] $customers
     */
    private function updateCustomersBehavior(array $customers): void
    {
        foreach ($customers as $customer) {
            // посетитель останавливается, прислушивается к музыке
            $isDancing = false;

            // и пытается понять, может ли он под это танцевать
            foreach ($this->music->getDances() as $danceType) {
                if ($customer->canDance($danceType)) {
                    $isDancing = true;
                    $customer->goDance($danceType);
                    break;
                }
            }

            if (!$isDancing) {
                $customer->goDrink($this->bar);
            }
        }
    }
}