<?php

namespace App\Strategies;

interface StrategyInterface
{
    public string $nameCarrier {
        get;
    }

    public function calculate(float $weightKg): float;
}
