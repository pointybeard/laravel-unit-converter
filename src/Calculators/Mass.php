<?php

declare(strict_types=1);

namespace pointybeard\LaravelUnitConverter\Calculators;

class Mass extends AbstractCalculator
{
    protected function getConversions(): array
    {
        return [
            'mg' => ['g' => 0.001, 'kg' => 0.000001, 'lb' => 0.00000220462],
            'g' => ['mg' => 1000.0, 'kg' => 0.001, 'lb' => 0.00220462],
            'kg' => ['mg' => 1000000.0, 'g' => 1000.0, 'lb' => 2.20462],
            'lb' => ['mg' => 453592, 'g' => 453.592, 'kg' => 0.453592],
        ];
    }
}
