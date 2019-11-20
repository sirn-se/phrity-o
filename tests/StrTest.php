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
class StrTest extends \PHPUnit_Framework_TestCase
{

    /**
     * Set up for all tests
     */
    public function setUp()
    {
        error_reporting(-1);
    }


    /**
     * Test null input
     */
    public function testNullInput()
    {
        $str = new Str();
        $this->assertSame('', $str());
        $this->assertSame('', $str(null));
        $this->assertSame('', "{$str}");
    }

    /**
     * Test string input
     */
    public function testStringInput()
    {
        $str = new Str('initial content');
        $this->assertSame('initial content', $str());
        $this->assertSame('set content', $str('set content'));
        $this->assertSame('set content', "{$str}");
    }

    /**
     * Test numeric input
     */
    public function testNumericInput()
    {
        $str = new Str(1234);
        $this->assertSame('1234', $str());
        $this->assertSame('56.789', $str(56.789));
        $this->assertSame('56.789', "{$str}");
    }

    /**
     * Test O\Str instance input
     */
    public function testStrClassInput()
    {
        $str_1 = new Str('initial content');
        $str_2 = new Str($str_1);
        $this->assertSame('initial content', $str_2());
        $this->assertSame('initial content', "{$str_2}");
    }

    /**
     * Test object input
     */
    public function testObjectInput()
    {
        $arr = new \Phrity\O\Arr();
        $str = new Str($arr);
        $this->assertSame('Phrity\O\Arr(0)', $str());
        $this->assertSame('Phrity\O\Arr(0)', "{$str}");
    }

    /**
     * Test constructor w/ bad input data
     * @expectedException InvalidArgumentException
     * @expectedExceptionMessage Unsupported input data for O\Str
     */
    public function testConstructorArgumentType()
    {
        $str = new Str(new \stdClass());
    }

    /**
     * Test constructor w/ bad argument
     * @expectedException InvalidArgumentException
     * @expectedExceptionMessage Unsupported argument for O\Str
     */
    public function testConstructorArgumentCount()
    {
        $str = new Str('aaa', 'unsupported');
    }

    /**
     * Test setter w/ bad input data
     * @expectedException InvalidArgumentException
     * @expectedExceptionMessage Unsupported input data for O\Str
     */
    public function testSetterException()
    {
        $str = new Str();
        $str(new \stdClass());
    }
}
