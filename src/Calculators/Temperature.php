<?php

declare(strict_types=1);

namespace pointybeard\LaravelUnitConverter\Calculators;

class Temperature extends AbstractCalculator
{
    protected function getConversions(): array
    {
        return [
            'c' => [
                'f' => 'celsiusToFahrenheit',
                'k' => 'celsiusToKelvin',
            ],
            'f' => [
                'c' => 'fahrenheitToCelsius',
                'k' => 'fahrenheitToKelvin',
            ],
            'k' => [
                'c' => 'kelvinToCelsius',
                'f' => 'kelvinToFahrenheit',
            ],
        ];
    }

    protected function celsiusToFahrenheit(float $value): float
    {
        return ($value * 9.0 / 5.0) + 32.0;
    }

    protected function celsiusToKelvin(float $value): float
    {
        return $value + 273.15;
    }

    protected function fahrenheitToCelsius(float $value): float
    {
        return ($value - 32.0) * 5.0 / 9.0;
    }

    protected function fahrenheitToKelvin(float $value): float
    {
        return ($value - 32.0) * 5.0 / 9.0 + 273.15;
    }

    protected function kelvinToCelsius(float $value): float
    {
        return $value - 273.15;
    }

    protected function kelvinToFahrenheit(float $value): float
    {
        return ($value - 273.15) * 9.0 / 5.0 + 32.0;
    }
}
