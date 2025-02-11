<?php

declare(strict_types=1);

namespace Tests\Unit;

use pointybeard\LaravelUnitConverter\Enums\Units;
use pointybeard\LaravelUnitConverter\Facades\UnitConverter;
use Tests\TestCase;

class UnitConverterTest extends TestCase
{
    #[Test]
    public function test_can_convert_kg_to_g()
    {
        $result = UnitConverter::convert(5)->from(Units::KG)->to(Units::G);
        $this->assertEquals(5000, $result);
    }

    #[Test]
    public function test_can_convert_cm_to_in()
    {
        $result = UnitConverter::convert(10)->from('cm')->to('in');
        $this->assertEqualsWithDelta(3.93701, round($result, 5), 0.00001);
    }

    #[Test]
    public function test_returns_same_value_for_same_units()
    {
        $result = UnitConverter::convert(100)->from('cm')->to('cm');
        $this->assertEquals(100, $result);
    }

    #[Test]
    public function test_can_convert_celsius_to_fahrenheit()
    {
        $result = UnitConverter::convert(25)->from('c')->to('f');
        $this->assertEquals(77, $result);
    }

    #[Test]
    public function test_can_convert_fahrenhetest_to_celsius()
    {
        $result = UnitConverter::convert(77)->from('f')->to('c');
        $this->assertEquals(25, $result);
    }

    #[Test]
    public function test_can_convert_celsius_to_kelvin()
    {
        $result = UnitConverter::convert(25)->from('c')->to('k');
        $this->assertEquals(298.15, $result);
    }

    #[Test]
    public function test_can_convert_kelvin_to_fahrenheit()
    {
        $result = UnitConverter::convert(298.15)->from('k')->to('f');
        $this->assertEquals(77, round($result, 2));
    }

    #[Test]
    public function test_can_convert_kilograms_to_pounds()
    {
        $result = UnitConverter::convert(2.5)->from('kg')->to('lb');
        $this->assertEqualsWithDelta(5.51155, 5.51156, 0.00005);
    }

    #[Test]
    public function test_can_convert_meters_to_millimeters()
    {
        $result = UnitConverter::convert(1.2)->from('m')->to('mm');
        $this->assertEquals(1200, $result);
    }

    #[Test]
    public function test_can_convert_fahrenhetest_to_kelvin()
    {
        $result = UnitConverter::convert(32)->from('f')->to('k');
        $this->assertEquals(273.15, round($result, 2));
    }

    #[Test]
    public function test_throws_exception_for_unsupported_units()
    {
        $this->expectException(\InvalidArgumentException::class);
        UnitConverter::convert(1)->from('g')->to('cm');
    }
}
