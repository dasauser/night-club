<?php

namespace Dasauser\DancingClub\Dances;

class ElectroDance implements Dance
{
    public function getActions(): string
    {
        return 'Очень много поворачивает суставами рук и ног; тело почти неподвижно, как и голова';
    }

    public function getName(): string
    {
        return 'Electro-dance';
    }
}