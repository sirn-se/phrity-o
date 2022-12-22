<?php

/**
 * File for generic O\Str tests.
 * @package Phrity > O
 */

declare(strict_types=1);

namespace Phrity\O;

use Phrity\O\Str;

/**
 * Generic O\Str tests.
 */
class StrTest extends \PHPUnit\Framework\TestCase
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
        $str = new Str();
        $this->assertSame('', $str());
        $this->assertSame('', $str(null));
        $this->assertSame('', "{$str}");
    }

    /**
     * Test string input
     */
    public function testStringInput(): void
    {
        $str = new Str('initial content');
        $this->assertSame('initial content', $str());
        $this->assertSame('set content', $str('set content'));
        $this->assertSame('set content', "{$str}");
    }

    /**
     * Test numeric input
     */
    public function testNumericInput(): void
    {
        $str = new Str(1234);
        $this->assertSame('1234', $str());
        $this->assertSame('56.789', $str(56.789));
        $this->assertSame('56.789', "{$str}");
    }

    /**
     * Test O\Str instance input
     */
    public function testStrClassInput(): void
    {
        $str_1 = new Str('initial content');
        $str_2 = new Str($str_1);
        $this->assertSame('initial content', $str_2());
        $this->assertSame('initial content', "{$str_2}");
    }

    /**
     * Test object input
     */
    public function testObjectInput(): void
    {
        $arr = new \Phrity\O\Arr();
        $str = new Str($arr);
        $this->assertSame('Arr(0)', $str());
        $this->assertSame('Arr(0)', "{$str}");
    }

    /**
     * Test constructor w/ bad input data
     */
    public function testConstructorArgumentType(): void
    {
        $this->expectException('InvalidArgumentException');
        $this->expectExceptionMessage('Unsupported input data for O\Str');
        $str = new Str(new \stdClass());
    }

    /**
     * Test constructor w/ bad argument
     */
    public function testConstructorArgumentCount(): void
    {
        $this->expectException('InvalidArgumentException');
        $this->expectExceptionMessage('Unsupported argument for O\Str');
        $str = new Str('aaa', 'unsupported');
    }

    /**
     * Test setter w/ bad input data
     */
    public function testSetterException(): void
    {
        $str = new Str();
        $this->expectException('InvalidArgumentException');
        $this->expectExceptionMessage('Unsupported input data for O\Str');
        $str(new \stdClass());
    }
}
