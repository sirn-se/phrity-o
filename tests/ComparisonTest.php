<?php
/**
 * File for O comparison tests.
 * @package Phrity > Util > Numerics
 */
namespace Phrity\O;

use Phrity\O\Arr;
use Phrity\O\Obj;

/**
 * Generic O\Arr tests.
 */
class ComparisonTest extends \PHPUnit_Framework_TestCase
{

    /**
     * Set up for all tests
     */
    public function setUp()
    {
        error_reporting(-1);
    }


    // Test comparision

    /**
     * Test Arr compare
     */
    public function testArrCompare()
    {
        $arr_1 = new Arr([1, 2, 3]);
        $arr_2 = new Arr([1, 2, 3]);
        $arr_3 = new Arr([1, 2, 3, 4]);

        $this->assertEquals(0, $arr_1->compare($arr_2));
        $this->assertEquals(-1, $arr_1->compare($arr_3));
        $this->assertEquals(1, $arr_3->compare($arr_2));
    }

    /**
     * Test Obj compare
     */
    public function testObjCompare()
    {
        $obj_1 = new Obj(['a' => 1, 'b' => 2, 'c' => 3]);
        $obj_2 = new Obj(['a' => 1, 'b' => 2, 'c' => 3]);
        $obj_3 = new Obj(['a' => 1, 'b' => 2, 'c' => 3, 'd' => 4]);

        $this->assertEquals(0, $obj_1->compare($obj_2));
        $this->assertEquals(-1, $obj_1->compare($obj_3));
        $this->assertEquals(1, $obj_3->compare($obj_2));
    }

    /**
     * Test Arr failed comparison
     * @expectedException Phrity\Comparison\IncomparableException
     * @expectedExceptionMessage Can only compare O\Arr
     */
    public function testArrIncomparable()
    {
        $arr = new Arr([1, 2, 3]);
        $arr->compare('Not comparable with O\Arr');
    }

    /**
     * Test Obj failed comparison
     * @expectedException Phrity\Comparison\IncomparableException
     * @expectedExceptionMessage Can only compare O\Obj
     */
    public function testObjIncomparable()
    {
        $obj = new Obj(['a' => 1, 'b' => 2, 'c' => 3]);
        $obj->compare('Not comparable with O\Obj');
    }
}
