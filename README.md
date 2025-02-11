# Laravel Unit Converter

A Laravel package for conversion between simple unit types e.g. G to KG, IN to CM

## Installation

This library is installed via [Composer](http://getcomposer.org/). To install, use `composer require pointybeard/laravel-unit-converter`.

### Requirements

This library requires PHP 8.0 or greater.

## Usage

The UnitConverter facade allows you to perform conversions with a simple and intuitive fluent interface.

```php
<?php

use pointybeard\LaravelUnitConverter\Facades\UnitConverter;

// 25 Celsius to Fahrenheit
$result = UnitConverter::convert(25)->from('c')->to('f');
echo $result; // 77

// 2.5 Kilograms to Pounds
$result = UnitConverter::convert(2.5)->from('kg')->to('lb');
echo $result; // 5.51156

// 1,000 Millimeters to Meters
$result = UnitConverter::convert(1000)->from('mm')->to('m');
echo $result; // 1

```

If you attempt to convert between unsupported units, an exception will be thrown:

```php
<?php

use pointybeard\LaravelUnitConverter\Facades\UnitConverter;

try {
    UnitConverter::convert(10)->from('abc')->to('xyz');
} catch (\InvalidArgumentException $e) {
    echo $e->getMessage(); 
    // Unsupported unit: abc
}

```

### Adding Calculators

You can extend the package by registering custom calculators to handle additional unit conversions.

```php
<?php

use Pointybeard\LaravelUnitConverter\UnitConverter;
use Pointybeard\LaravelUnitConverter\Calculators\CalculatorInterface;

class CustomCalculator implements CalculatorInterface
{
    protected function getConversions(): array
        return [
            'custom1' => [
                'custom2' => 2.0, // Conversion factor: 1 custom1 = 2 custom2
            ],
        ];
    }
}

// Register the custom calculator
UnitConverter::registerCalculator(new CustomCalculator);

// Usage
echo UnitConverter::convert(10)->from('custom1')->to('custom2'); // 20
```

If your unit conversions require more complex logic (e.g., temperature conversions), you can create a method-based calculator by extending the AbstractCalculator. The conversion logic is defined in specific methods, and getConversions() maps unit pairs to these methods.

```php
<?php

use Pointybeard\LaravelUnitConverter\Calculators\AbstractCalculator;
use Pointybeard\LaravelUnitConverter\UnitConverter;

class CustomCalculator extends AbstractCalculator
{
    protected function getConversions(): array
    {
        return [
            'custom1' => [
                'custom2' => 'customMethod',
            ],
        ];
    }

    private function customMethod(float $value): float
    {
        return $value * 45;
    }
}

// Register the CustomCalculator
UnitConverter::registerCalculator(CustomCalculator::class);

// Usage
echo UnitConverter::convert(10)->from('custom1')->to('custom2'); // 450
```

## Support

If you believe you have found a bug, please report it using the [GitHub issue tracker](https://github.com/pointybeard/unit-converter/issues).

## License

"Laravel Unit Converter" is released under the [MIT License](http://www.opensource.org/licenses/MIT).
