<?php

declare(strict_types=1);

namespace pointybeard\LaravelUnitConverter\Providers;

use Illuminate\Support\ServiceProvider;
use pointybeard\LaravelUnitConverter\Calculators;
use pointybeard\LaravelUnitConverter\UnitConverter;

class UnitConverterServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->singleton('pointybeard.laravel_unit_converter', function () {
            return new UnitConverter;
        });

        $this->registerCalculators();
    }

    protected function registerCalculators(): void
    {
        UnitConverter::registerCalculator([
            Calculators\Temperature::class,
            Calculators\Mass::class,
            Calculators\Length::class,
            Calculators\Volume::class,
            Calculators\Area::class,
            Calculators\Speed::class,
        ]);
    }
}
