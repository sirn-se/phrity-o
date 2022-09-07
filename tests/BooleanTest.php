<?php

/**
 * File for generic O\Boolean tests.
 * @package Phrity > O
 */

declare(strict_types=1);

namespace Phrity\O;

use Phrity\O\Boolean;

/**
 * Generic O\Boolean tests.
 */
class BooleanTest extends \PHPUnit\Framework\TestCase
{
    /**
     * Set up for all tests
     */
    public function setUp(): void
    {
        error_reporting(-1);
    }

    /**
     * Test false input
     */
    public function testFalseInput(): void
    {
        $bool = new Boolean(false);
        $this->assertSame(false, $bool());
        $this->assertSame(false, $bool(false));
        $this->assertSame('', "{$bool}");
    }

    /**
     * Test true input
     */
    public function testTrueInput(): void
    {
        $bool = new Boolean(true);
        $this->assertSame(true, $bool());
        $this->assertSame(true, $bool(true));
        $this->assertSame('1', "{$bool}");
    }

    /**
     * Test null input
     */
    public function testNullInput(): void
    {
        $bool = new Boolean();
        $this->assertSame(false, $bool());
        $this->assertSame(false, $bool(null));
        $this->assertSame('', "{$bool}");
    }

    /**
     * Test integer input
     */
    public function testIntegerFalseInput(): void
    {
        $bool = new Boolean(0);
        $this->assertSame(false, $bool());
        $this->assertSame(false, $bool(-1));
        $this->assertSame('', "{$bool}");
    }

    /**
     * Test integer input
     */
    public function testIntegerTrueInput(): void
    {
        $bool = new Boolean(1);
        $this->assertSame(true, $bool());
        $this->assertSame(true, $bool(1));
        $this->assertSame('1', "{$bool}");
    }

    /**
     * Test string input
     */
    public function testStringFalseInput(): void
    {
        $bool = new Boolean('');
        $this->assertSame(false, $bool());
        $this->assertSame(false, $bool('0'));
        $this->assertSame('', "{$bool}");
    }

    /**
     * Test string input
     */
    public function testStringTrueInput(): void
    {
        $bool = new Boolean('1');
        $this->assertSame(true, $bool());
        $this->assertSame(true, $bool('1'));
        $this->assertSame('1', "{$bool}");
    }

    /**
     * Test O\Boolean instance input
     */
    public function testBooleanClassInput(): void
    {
        $bool_1 = new Boolean(true);
        $bool_2 = new Boolean($bool_1);
        $this->assertSame(true, $bool_2());
        $this->assertSame('1', "{$bool_2}");
    }

    /**
     * Test constructor w/ bad input data
     */
    public function testConstructorArgumentType(): void
    {
        $this->expectException('InvalidArgumentException');
        $this->expectExceptionMessage('Unsupported input data for O\Boolean');
        $bool = new Boolean(new \stdClass());
    }

    /**
     * Test constructor w/ bad argument
     */
    public function testConstructorArgumentCount(): void
    {
        $this->expectException('InvalidArgumentException');
        $this->expectExceptionMessage('Unsupported argument for O\Boolean');
        $bool = new Boolean(true, 'unsupported');
    }

    /**
     * Test setter w/ bad input data
     */
    public function testSetterException(): void
    {
        $bool = new Boolean();
        $this->expectException('InvalidArgumentException');
        $this->expectExceptionMessage('Unsupported input data for O\Boolean');
        $bool(new \stdClass());
    }
}
