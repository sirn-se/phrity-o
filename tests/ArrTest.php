<?php
/**
 * File for generic O\Arr tests.
 * @package Phrity > Util > Numerics
 */
namespace Phrity\O;

use Phrity\O\Arr;

/**
 * Generic O\Arr tests.
 */
class ArrTest extends \PHPUnit_Framework_TestCase
{

    /**
     * Set up for all tests
     */
    public function setUp()
    {
        error_reporting(-1);
    }

    /**
     * Test toString method
     */
    public function testToString()
    {
        $obj = new Arr([1, 2, null, []]);
        $this->assertEquals('Phrity\O\Arr(4)', "{$obj}");
    }
}
