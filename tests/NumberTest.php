<?php

/**
 * File for generic O\Number tests.
 * @package Phrity > O
 */

declare(strict_types=1);

namespace Phrity\O;

use Phrity\O\Number;

/**
 * Generic O\Number tests.
 */
class NumberTest extends \PHPUnit\Framework\TestCase
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
    public function testNullInput(): void
    {
        $num = new Number();
        $this->assertSame(0.0, $num());
        $this->assertSame(0.0, $num(null));
        $this->assertSame('0', "{$num}");
    }

    /**
     * Test integer input
     */
    public function testIntegerInput(): void
    {
        $num = new Number(1234);
        $this->assertSame(1234.0, $num());
        $this->assertSame(5678.0, $num(5678));
        $this->assertSame('5678', "{$num}");
    }

    /**
     * Test float input
     */
    public function testFloatInput(): void
    {
        $num = new Number(12.34);
        $this->assertSame(12.34, $num());
        $this->assertSame(56.78, $num(56.78));
        $this->assertSame('56.78', "{$num}");
    }

    /**
     * Test numeric string input
     */
    public function testNumericStringInput(): void
    {
        $num = new Number('12.34');
        $this->assertSame(12.34, $num());
        $this->assertSame(56.78, $num('56.78'));
        $this->assertSame('56.78', "{$num}");
    }

    /**
     * Test O\Number instance input
     */
    public function testNumberClassInput(): void
    {
        $num_1 = new Number(12.34);
        $num_2 = new Number($num_1);
        $this->assertSame(12.34, $num_2());
        $this->assertSame('12.34', "{$num_2}");
    }

    /**
     * Test constructor w/ bad input data
     */
    public function testConstructorArgumentType(): void
    {
        $this->expectException('InvalidArgumentException');
        $this->expectExceptionMessage('Unsupported input data for O\Number');
        $num = new Number(new \stdClass());
    }

    /**
     * Test constructor w/ bad argument
     */
    public function testConstructorArgumentCount(): void
    {
        $this->expectException('InvalidArgumentException');
        $this->expectExceptionMessage('Unsupported argument for O\Number');
        $num = new Number(5.6, 'unsupported');
    }

    /**
     * Test setter w/ bad input data
     */
    public function testSetterException(): void
    {
        $num = new Number();
        $this->expectException('InvalidArgumentException');
        $this->expectExceptionMessage('Unsupported input data for O\Number');
        $num(new \stdClass());
    }
}
