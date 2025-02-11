<?php

declare(strict_types=1);

namespace pointybeard\LaravelUnitConverter\Calculators;

class Length extends AbstractCalculator
{
    protected function getConversions(): array
    {
        return [
            'mm' => ['cm' => 0.1, 'm' => 0.001, 'km' => 0.000001, 'in' => 0.0393701, 'ft' => 0.00328084],
            'cm' => ['mm' => 10.0, 'm' => 0.01, 'km' => 0.00001, 'in' => 0.393701, 'ft' => 0.0328084],
            'm' => ['mm' => 1000.0, 'cm' => 100.0, 'km' => 0.001, 'in' => 39.3701, 'ft' => 3.28084],
            'km' => ['mm' => 1000000.0, 'cm' => 100000.0, 'm' => 1000.0, 'in' => 39370.1, 'ft' => 3280.84],
            'in' => ['mm' => 25.4, 'cm' => 2.54, 'm' => 0.0254, 'km' => 0.0000254, 'ft' => 0.0833333],
            'ft' => ['mm' => 304.8, 'cm' => 30.48, 'm' => 0.3048, 'km' => 0.0003048, 'in' => 12],
        ];
    }
}
