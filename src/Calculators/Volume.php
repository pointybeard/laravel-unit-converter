<?php

declare(strict_types=1);

namespace pointybeard\LaravelUnitConverter\Calculators;

class Volume extends AbstractCalculator
{
    protected function getConversions(): array
    {
        return [
            'ml' => ['l' => 0.001, 'm3' => 0.000001],
            'l' => ['ml' => 1000.0, 'm3' => 0.001],
            'm3' => ['ml' => 1000000.0, 'l' => 1000.0],
        ];
    }
}
