<?php

declare(strict_types=1);

namespace pointybeard\LaravelUnitConverter;

use Illuminate\Support\Collection;
use pointybeard\LaravelUnitConverter\Contracts\CalculatorInterface;
use pointybeard\LaravelUnitConverter\Enums\Units;
use Webmozart\Assert\Assert;

class UnitConverter
{
    protected float $value;

    protected string $from;

    protected static Collection $calculators;

    public static function initialize(): void
    {
        if (! isset(self::$calculators)) {
            self::$calculators = collect();
        }
    }

    /**
     * @param  CalculatorInterface|string|array<int,string|CalculatorInterface>  $calculators
     */
    public static function registerCalculator(CalculatorInterface|string|array $calculators): void
    {
        self::initialize();

        $calculators = is_array($calculators) ? $calculators : [$calculators];

        foreach ($calculators as $calculator) {

            // classpath
            if (is_string($calculator)) {
                if (! class_exists($calculator)) {
                    throw new \InvalidArgumentException("Calculator class {$calculator} does not exist.");
                }

                $calculator = app($calculator);
            }

            if (! $calculator instanceof CalculatorInterface) {
                throw new \InvalidArgumentException(
                    'The provided calculator must implement CalculatorInterface.'
                );
            }

            self::$calculators->push($calculator);
        }
    }

    public function convert(float $value): static
    {
        $this->value = $value;

        return $this;
    }

    public function from(Units|string $from): static
    {
        $this->from = self::normaliseUnits($from);

        return $this;
    }

    public function to(Units|string $to): float
    {
        $to = self::normaliseUnits($to);

        // (guard) no conversion needed
        if ($this->from === $to) {
            return $this->value;
        }

        self::initialize();

        $calculator = self::findCalculator($this->from, $to);

        // (guard) no calculator found
        if (! $calculator instanceof CalculatorInterface) {
            throw new \InvalidArgumentException("No calculator found to handle conversion from {$this->from} to {$to}.");
        }

        return $calculator->convert($this->value, $this->from, $to);

    }

    protected static function normaliseUnits(Units|string $unit): string
    {
        if ($unit instanceof Units) {
            $unit = $unit->value;
        }

        $unit = strtolower($unit);

        // (guard) unit is not supported
        if (! self::findCalculator($unit) instanceof CalculatorInterface) {
            throw new \InvalidArgumentException("Unsupported unit: {$unit}");
        }

        return strtolower($unit);
    }

    public static function findCalculator(string $from, ?string $to = null): mixed
    {
        self::initialize();

        return self::$calculators->first(function ($calculator) use ($from, $to) {

            Assert::isInstanceOf($calculator, CalculatorInterface::class);

            return $calculator->supports($from, $to);
        });
    }
}
