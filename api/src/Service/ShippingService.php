<?php

namespace App\Service;

use App\Strategies\StrategyInterface;

class ShippingService
{
    /** @var StrategyInterface[] */
    private array $strategies;

    public function __construct(iterable $strategies)
    {
        foreach ($strategies as $strategy) {
            $this->strategies[$strategy->nameCarrier] = $strategy;
        }
    }

    public function calculate(string $carrier, float $weightKg): float|string
    {
        return $this->strategies[$carrier]->calculate($weightKg);
    }

    public function getCarriers(): array
    {
        return array_keys($this->strategies);
    }
}
