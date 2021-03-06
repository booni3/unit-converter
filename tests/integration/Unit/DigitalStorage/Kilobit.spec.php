<?php

declare(strict_types = 1);

/**
 * This file is part of the jordanbrauer/unit-converter PHP package.
 *
 * @copyright 2018 Jordan Brauer <18744334+jordanbrauer@users.noreply.github.com>
 * @license MIT
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace UnitConverter\Tests\Integration\Unit\DigitalStorage;

use PHPUnit\Framework\TestCase;
use UnitConverter\Calculator\SimpleCalculator;
use UnitConverter\Registry\UnitRegistry;
use UnitConverter\Unit\DigitalStorage\Bit;
use UnitConverter\Unit\DigitalStorage\Kilobit;
use UnitConverter\UnitConverter;

/**
 * Test that a kilobit is indeed a kilobit.
 *
 * @covers \UnitConverter\Unit\DigitalStorage\Kilobit
 * @uses \UnitConverter\Unit\DigitalStorage\Bit
 * @uses \UnitConverter\Unit\AbstractUnit
 * @uses \UnitConverter\UnitConverter
 * @uses \UnitConverter\Calculator\SimpleCalculator
 * @uses \UnitConverter\Calculator\AbstractCalculator
 * @uses \UnitConverter\Calculator\Formula\AbstractFormula
 * @uses \UnitConverter\Calculator\Formula\UnitConversionFormula
 * @uses \UnitConverter\Registry\UnitRegistry
 * @uses \UnitConverter\Support\ArrayDotNotation
 * @uses \UnitConverter\Support\Collection
 */
class KilobitSpec extends TestCase
{
    protected function setUp()
    {
        $this->converter = new UnitConverter(
            new UnitRegistry([
                new Bit(),
                new Kilobit(),
            ]),
            new SimpleCalculator()
        );
    }

    protected function tearDown()
    {
        unset($this->converter);
    }

    /**
     * @test
     */
    public function assert1KilobitIs1000Bits()
    {
        $expected = 1000;
        $actual = $this->converter
            ->convert(1)
            ->from("kb")
            ->to("b");

        $this->assertEquals($expected, $actual);
    }
}
