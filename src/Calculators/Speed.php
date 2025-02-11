<?php

declare(strict_types=1);

namespace pointybeard\LaravelUnitConverter\Calculators;

class Speed extends AbstractCalculator
{
    protected function getConversions(): array
    {
        return [
            'm/s' => ['km/h' => 3.6, 'mph' => 2.23694, 'kn' => 1.94384],
            'km/h' => ['m/s' => 0.277778, 'mph' => 0.621371, 'kn' => 0.539957],
            'mph' => ['m/s' => 0.44704, 'km/h' => 1.60934, 'kn' => 0.868976],
            'kn' => ['m/s' => 0.514444, 'km/h' => 1.852, 'mph' => 1.15078],
        ];
    }
}
