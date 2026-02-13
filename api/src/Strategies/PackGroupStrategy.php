<?php

namespace App\Strategies;

class PackGroupStrategy implements StrategyInterface
{
    public function calculate(float $weightKg): float
    {
        return $weightKg;
    }

    public string $nameCarrier {
        get {
            return 'packgroup';
        }
    }
}
