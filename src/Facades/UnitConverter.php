<?php

declare(strict_types=1);

namespace pointybeard\LaravelUnitConverter\Facades;

use Illuminate\Support\Facades\Facade;

class UnitConverter extends Facade
{
    protected static function getFacadeAccessor(): string
    {
        return 'pointybeard.laravel_unit_converter';
    }
}
