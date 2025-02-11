<?php

declare(strict_types=1);

namespace Tests;

use Orchestra\Testbench\TestCase as BaseTestCase;
use pointybeard\LaravelUnitConverter\Facades\UnitConverter;
use pointybeard\LaravelUnitConverter\Providers\UnitConverterServiceProvider;

abstract class TestCase extends BaseTestCase
{
    protected function getPackageProviders($app)
    {
        return [
            UnitConverterServiceProvider::class,
        ];
    }

    protected function getPackageAliases($app)
    {
        return [
            'UnitConverter' => UnitConverter::class,
        ];
    }
}
