<?php

/**
 * File for generic O\Integer tests.
 * @package Phrity > O
 */

declare(strict_types=1);

namespace Phrity\O;

use Phrity\O\Integer;

/**
 * Generic O\Integer tests.
 */
class IntegerTest extends \PHPUnit\Framework\TestCase
{
    /**
     * Set up for all tests
     */
    public function setUp(): void
    {
        error_reporting(-1);
    }


    /**
     * Test null input
     */
    public function testZeroInput(): void
    {
        $int = new Integer();
        $this->assertSame(0, $int());
        $this->assertSame(0, $int(0));
        $this->assertSame('0', "{$int}");
    }

    /**
     * Test integer input
     */
    public function testIntegerInput(): void
    {
        $int = new Integer(1234);
        $this->assertSame(1234, $int());
        $this->assertSame(5678, $int(5678));
        $this->assertSame('5678', "{$int}");
    }

    /**
     * Test numeric string input
     */
    public function testNumericStringInput(): void
    {
        $int = new Integer('1234');
        $this->assertSame(1234, $int());
        $this->assertSame(5678, $int(5678));
        $this->assertSame('5678', "{$int}");
    }

    /**
     * Test O\Integer instance input
     */
    public function testIntegerClassInput(): void
    {
        $int_1 = new Integer(1234);
        $int_2 = new Integer($int_1);
        $this->assertSame(1234, $int_2());
        $this->assertSame('1234', "{$int_2}");
    }

    /**
     * Test constructor w/ bad input data
     */
    public function testConstructorArgumentType(): void
    {
        $this->expectException('InvalidArgumentException');
        $this->expectExceptionMessage('Unsupported input data for O\Integer');
        $int = new Integer(new \stdClass());
    }

    /**
     * Test constructor w/ bad argument
     */
    public function testConstructorArgumentCount(): void
    {
        $this->expectException('InvalidArgumentException');
        $this->expectExceptionMessage('Unsupported argument for O\Integer');
        $int = new Integer(56, 'unsupported');
    }

    /**
     * Test constructor w/ bad input data
     */
    public function testFloatException(): void
    {
        $this->expectException('InvalidArgumentException');
        $this->expectExceptionMessage('Unsupported input data for O\Integer');
        $int = new Integer('12.34');
    }

    /**
     * Test setter w/ bad input data
     */
    public function testSetterException(): void
    {
        $int = new Integer();
        $this->expectException('TypeError');
        $this->expectExceptionMessage('Phrity\O\Integer::__invoke():');
        $int('not an integer');
    }
}
