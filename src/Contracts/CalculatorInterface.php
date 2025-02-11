<?php

declare(strict_types=1);

namespace pointybeard\LaravelUnitConverter\Contracts;

interface CalculatorInterface
{
    public function supports(string $from, ?string $to): bool;

    public function convert(float $value, string $from, string $to): float;
}
