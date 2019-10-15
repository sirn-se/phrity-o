<?php
/**
 * File for generic O\Integer tests.
 * @package Phrity > O
 */
namespace Phrity\O;

use Phrity\O\Integer;

/**
 * Generic O\Integer tests.
 */
class IntegerTest extends \PHPUnit_Framework_TestCase
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
        $int = new Integer();
        $this->assertSame(0, $int());
        $this->assertSame(0, $int(null));
        $this->assertSame('0', "{$int}");
    }

    /**
     * Test integer input
     */
    public function testIntegerInput()
    {
        $int = new Integer(1234);
        $this->assertSame(1234, $int());
        $this->assertSame(5678, $int(5678));
        $this->assertSame('5678', "{$int}");
    }

    /**
     * Test numeric string input
     */
    public function testNumericStringInput()
    {
        $int = new Integer('1234');
        $this->assertSame(1234, $int());
        $this->assertSame(5678, $int('5678'));
        $this->assertSame('5678', "{$int}");
    }

    /**
     * Test O\Integer instance input
     */
    public function testIntegerClassInput()
    {
        $int_1 = new Integer(1234);
        $int_2 = new Integer($int_1);
        $this->assertSame(1234, $int_2());
        $this->assertSame('1234', "{$int_2}");
    }

    /**
     * Test constructor w/ bad input data
     * @expectedException InvalidArgumentException
     * @expectedExceptionMessage Unsupported input data for O\Integer
     */
    public function testConstructorException()
    {
        $int = new Integer(new \stdClass);
    }

    /**
     * Test constructor w/ bad input data
     * @expectedException InvalidArgumentException
     * @expectedExceptionMessage Unsupported input data for O\Integer
     */
    public function testFloatException()
    {
        $int = new Integer('12.34');
    }

    /**
     * Test setter w/ bad input data
     * @expectedException InvalidArgumentException
     * @expectedExceptionMessage Unsupported input data for O\Integer
     */
    public function testSetterException()
    {
        $int = new Integer();
        $int(new \stdClass);
    }
}
