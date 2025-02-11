<?php

declare(strict_types=1);

namespace pointybeard\LaravelUnitConverter\Calculators;

class Area extends AbstractCalculator
{
    protected function getConversions(): array
    {
        return [
            'mm2' => ['cm2' => 0.01, 'm2' => 0.000001],
            'cm2' => ['mm2' => 100.0, 'm2' => 0.0001],
            'm2' => ['mm2' => 1000000.0, 'cm2' => 10000.0, 'km2' => 0.000001],
            'km2' => ['m2' => 1000000.0],
            'ft2' => ['in2' => 144.0, 'm2' => 0.092903],
            'in2' => ['ft2' => 0.00694444, 'm2' => 0.00064516],
        ];
    }
}
