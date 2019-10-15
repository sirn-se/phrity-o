<?php
/**
 * File for O comparison tests.
 * @package Phrity > Util > Numerics
 */
namespace Phrity\O;

use Phrity\O\Arr;
use Phrity\O\Obj;
use Phrity\O\Str;
use Phrity\O\Number;
use Phrity\O\Integer;
use Phrity\O\Boolean;

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
     * Test Str compare
     */
    public function testStrCompare()
    {
        $str_1 = new Str('aaa');
        $str_2 = new Str('aaa');
        $str_3 = new Str('bbb');

        $this->assertEquals(0, $str_1->compare($str_2));
        $this->assertEquals(-1, $str_1->compare($str_3));
        $this->assertEquals(1, $str_3->compare($str_2));
    }

    /**
     * Test Number compare
     */
    public function testNumberCompare()
    {
        $num_1 = new Number(5.6);
        $num_2 = new Number(5.6);
        $num_3 = new Number(7.8);

        $this->assertEquals(0, $num_1->compare($num_2));
        $this->assertEquals(-1, $num_1->compare($num_3));
        $this->assertEquals(1, $num_3->compare($num_2));
    }

    /**
     * Test Integer compare
     */
    public function testIntegerCompare()
    {
        $int_1 = new Integer(56);
        $int_2 = new Integer(56);
        $int_3 = new Integer(78);

        $this->assertEquals(0, $int_1->compare($int_2));
        $this->assertEquals(-1, $int_1->compare($int_3));
        $this->assertEquals(1, $int_3->compare($int_2));
    }

    /**
     * Test Boolean compare
     */
    public function testBooleanCompare()
    {
        $bool_1 = new Boolean(false);
        $bool_2 = new Boolean(false);
        $bool_3 = new Boolean(true);

        $this->assertEquals(0, $bool_1->compare($bool_2));
        $this->assertEquals(-1, $bool_1->compare($bool_3));
        $this->assertEquals(1, $bool_3->compare($bool_2));
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

    /**
     * Test Str failed comparison
     * @expectedException Phrity\Comparison\IncomparableException
     * @expectedExceptionMessage Can only compare O\Str
     */
    public function testStrIncomparable()
    {
        $str = new Str('aaa');
        $str->compare(new \stdClass);
    }

    /**
     * Test Number failed comparison
     * @expectedException Phrity\Comparison\IncomparableException
     * @expectedExceptionMessage Can only compare O\Number
     */
    public function testNumberIncomparable()
    {
        $obj = new Number(5.6);
        $obj->compare('Not comparable with O\Number');
    }

    /**
     * Test Integer failed comparison
     * @expectedException Phrity\Comparison\IncomparableException
     * @expectedExceptionMessage Can only compare O\Integer
     */
    public function testIntegerIncomparable()
    {
        $obj = new Integer(56);
        $obj->compare('Not comparable with O\Integer');
    }

    /**
     * Test Boolean failed comparison
     * @expectedException Phrity\Comparison\IncomparableException
     * @expectedExceptionMessage Can only compare O\Boolean
     */
    public function testBooleanIncomparable()
    {
        $obj = new Boolean(true);
        $obj->compare('Not comparable with O\Boolean');
    }
}
