<?php

declare(strict_types=1);

namespace pointybeard\LaravelUnitConverter\Calculators;

use pointybeard\LaravelUnitConverter\Contracts\CalculatorInterface;

abstract class AbstractCalculator implements CalculatorInterface
{
    /**
     * @return array<string, array<string, float|string>>
     */
    abstract protected function getConversions(): array;

    public function supports(string $from, ?string $to): bool
    {
        $conversions = $this->getConversions();

        if ($to === null || $to === $from) {
            return isset($conversions[$from]);
        }

        return isset($conversions[$from][$to]);
    }

    public function convert(float $value, string $from, string $to): float
    {
        $conversions = $this->getConversions();

        if (! isset($conversions[$from][$to])) {
            throw new \InvalidArgumentException("Unsupported conversion from {$from} to {$to}.");
        }

        $conversion = $conversions[$from][$to];

        if (is_numeric($conversion)) {
            return $value * $conversion;

        } elseif (is_string($conversion) && method_exists($this, $conversion)) {
            /** @var float $result */
            $result = $this->{$conversion}($value);

            return (float) $result;
        }

        throw new \InvalidArgumentException("Invalid conversion rule for {$from} to {$to}.");
    }
}
