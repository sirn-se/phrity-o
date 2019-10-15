<?php
/**
 * File for generic O\Number tests.
 * @package Phrity > O
 */
namespace Phrity\O;

use Phrity\O\Number;

/**
 * Generic O\Number tests.
 */
class NumberTest extends \PHPUnit_Framework_TestCase
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
        $num = new Number();
        $this->assertSame(0.0, $num());
        $this->assertSame(0.0, $num(null));
        $this->assertSame('0', "{$num}");
    }

    /**
     * Test integer input
     */
    public function testIntegerInput()
    {
        $num = new Number(1234);
        $this->assertSame(1234.0, $num());
        $this->assertSame(5678.0, $num(5678));
        $this->assertSame('5678', "{$num}");
    }

    /**
     * Test float input
     */
    public function testFloatInput()
    {
        $num = new Number(12.34);
        $this->assertSame(12.34, $num());
        $this->assertSame(56.78, $num(56.78));
        $this->assertSame('56.78', "{$num}");
    }

    /**
     * Test numeric string input
     */
    public function testNumericStringInput()
    {
        $num = new Number('12.34');
        $this->assertSame(12.34, $num());
        $this->assertSame(56.78, $num('56.78'));
        $this->assertSame('56.78', "{$num}");
    }

    /**
     * Test O\Number instance input
     */
    public function testNumberClassInput()
    {
        $num_1 = new Number(12.34);
        $num_2 = new Number($num_1);
        $this->assertSame(12.34, $num_2());
        $this->assertSame('12.34', "{$num_2}");
    }

    /**
     * Test constructor w/ bad input data
     * @expectedException InvalidArgumentException
     * @expectedExceptionMessage Unsupported input data for O\Number
     */
    public function testConstructorException()
    {
        $num = new Number(new \stdClass);
    }

    /**
     * Test setter w/ bad input data
     * @expectedException InvalidArgumentException
     * @expectedExceptionMessage Unsupported input data for O\Number
     */
    public function testSetterException()
    {
        $num = new Number();
        $num(new \stdClass);
    }
}
