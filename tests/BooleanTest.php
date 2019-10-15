<?php
/**
 * File for generic O\Boolean tests.
 * @package Phrity > O
 */
namespace Phrity\O;

use Phrity\O\Boolean;

/**
 * Generic O\Boolean tests.
 */
class BooleanTest extends \PHPUnit_Framework_TestCase
{

    /**
     * Set up for all tests
     */
    public function setUp()
    {
        error_reporting(-1);
    }

    /**
     * Test false input
     */
    public function testFalseInput()
    {
        $bool = new Boolean(false);
        $this->assertSame(false, $bool());
        $this->assertSame(false, $bool(false));
        $this->assertSame('', "{$bool}");
    }

    /**
     * Test true input
     */
    public function testTrueInput()
    {
        $bool = new Boolean(true);
        $this->assertSame(true, $bool());
        $this->assertSame(true, $bool(true));
        $this->assertSame('1', "{$bool}");
    }

    /**
     * Test null input
     */
    public function testNullInput()
    {
        $bool = new Boolean();
        $this->assertSame(false, $bool());
        $this->assertSame(false, $bool(null));
        $this->assertSame('', "{$bool}");
    }

    /**
     * Test integer input
     */
    public function testIntegerFalseInput()
    {
        $bool = new Boolean(0);
        $this->assertSame(false, $bool());
        $this->assertSame(false, $bool(-1));
        $this->assertSame('', "{$bool}");
    }

    /**
     * Test integer input
     */
    public function testIntegerTrueInput()
    {
        $bool = new Boolean(1);
        $this->assertSame(true, $bool());
        $this->assertSame(true, $bool(1));
        $this->assertSame('1', "{$bool}");
    }

    /**
     * Test string input
     */
    public function testStringFalseInput()
    {
        $bool = new Boolean('');
        $this->assertSame(false, $bool());
        $this->assertSame(false, $bool('0'));
        $this->assertSame('', "{$bool}");
    }

    /**
     * Test string input
     */
    public function testStringTrueInput()
    {
        $bool = new Boolean('1');
        $this->assertSame(true, $bool());
        $this->assertSame(true, $bool('1'));
        $this->assertSame('1', "{$bool}");
    }

    /**
     * Test O\Boolean instance input
     */
    public function testBooleanClassInput()
    {
        $bool_1 = new Boolean(true);
        $bool_2 = new Boolean($bool_1);
        $this->assertSame(true, $bool_2());
        $this->assertSame('1', "{$bool_2}");
    }

    /**
     * Test constructor w/ bad input data
     * @expectedException InvalidArgumentException
     * @expectedExceptionMessage Unsupported input data for O\Boolean
     */
    public function testConstructorArgumentType()
    {
        $bool = new Boolean(new \stdClass);
    }

    /**
     * Test constructor w/ bad argument
     * @expectedException InvalidArgumentException
     * @expectedExceptionMessage Unsupported argument for O\Boolean
     */
    public function testConstructorArgumentCount()
    {
        $bool = new Boolean(true, 'unsupported');
    }

    /**
     * Test setter w/ bad input data
     * @expectedException InvalidArgumentException
     * @expectedExceptionMessage Unsupported input data for O\Boolean
     */
    public function testSetterException()
    {
        $bool = new Boolean();
        $bool(new \stdClass);
    }
}
