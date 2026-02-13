<?php

namespace App\Strategies;

class TransCompanyStrategy implements StrategyInterface
{
    public function calculate(float $weightKg): float
    {
        if ($weightKg <= 10) {
            return 20;
        }
        return 100;
    }

    public string $nameCarrier {
        get {
            return 'transcompany';
        }
    }
}
