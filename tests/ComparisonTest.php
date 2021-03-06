<?php

/**
 * File for O comparison tests.
 * @package Phrity > Util > Numerics
 */

declare(strict_types=1);

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
class ComparisonTest extends \PHPUnit\Framework\TestCase
{

    /**
     * Set up for all tests
     */
    public function setUp(): void
    {
        error_reporting(-1);
    }


    // Test comparision

    /**
     * Test Arr compare
     */
    public function testArrCompare(): void
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
    public function testObjCompare(): void
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
    public function testStrCompare(): void
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
    public function testNumberCompare(): void
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
    public function testIntegerCompare(): void
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
    public function testBooleanCompare(): void
    {
        $bool_1 = new Boolean(false);
        $bool_2 = new Boolean(false);
        $bool_3 = new Boolean(true);

        $this->assertEquals(0, $bool_1->compare($bool_2));
        $this->assertEquals(-1, $bool_1->compare($bool_3));
        $this->assertEquals(1, $bool_3->compare($bool_2));
    }

    /**
     * Test Queue compare
     */
    public function testQueueCompare(): void
    {
        $queue_1 = new Queue([1, 2, 3]);
        $queue_2 = new Queue([1, 2, 3]);
        $queue_3 = new Queue([1, 2, 3, 4]);

        $this->assertEquals(0, $queue_1->compare($queue_2));
        $this->assertEquals(-1, $queue_1->compare($queue_3));
        $this->assertEquals(1, $queue_3->compare($queue_2));
    }

    /**
     * Test Stack compare
     */
    public function testStackCompare(): void
    {
        $stack_1 = new Stack([1, 2, 3]);
        $stack_2 = new Stack([1, 2, 3]);
        $stack_3 = new Stack([1, 2, 3, 4]);

        $this->assertEquals(0, $stack_1->compare($stack_2));
        $this->assertEquals(-1, $stack_1->compare($stack_3));
        $this->assertEquals(1, $stack_3->compare($stack_2));
    }

    /**
     * Test Arr failed comparison
     */
    public function testArrIncomparable(): void
    {
        $arr = new Arr([1, 2, 3]);
        $this->expectException('Phrity\Comparison\IncomparableException');
        $this->expectExceptionMessage('Can only compare O\Arr');
        $arr->compare('Not comparable with O\Arr');
    }

    /**
     * Test Obj failed comparison
     */
    public function testObjIncomparable(): void
    {
        $obj = new Obj(['a' => 1, 'b' => 2, 'c' => 3]);
        $this->expectException('Phrity\Comparison\IncomparableException');
        $this->expectExceptionMessage('Can only compare O\Obj');
        $obj->compare('Not comparable with O\Obj');
    }

    /**
     * Test Str failed comparison
     */
    public function testStrIncomparable(): void
    {
        $str = new Str('aaa');
        $this->expectException('Phrity\Comparison\IncomparableException');
        $this->expectExceptionMessage('Can only compare O\Str');
        $str->compare(new \stdClass());
    }

    /**
     * Test Number failed comparison
     */
    public function testNumberIncomparable(): void
    {
        $obj = new Number(5.6);
        $this->expectException('Phrity\Comparison\IncomparableException');
        $this->expectExceptionMessage('Can only compare O\Number');
        $obj->compare('Not comparable with O\Number');
    }

    /**
     * Test Integer failed comparison
     */
    public function testIntegerIncomparable(): void
    {
        $obj = new Integer(56);
        $this->expectException('Phrity\Comparison\IncomparableException');
        $this->expectExceptionMessage('Can only compare O\Integer');
        $obj->compare('Not comparable with O\Integer');
    }

    /**
     * Test Boolean failed comparison
     */
    public function testBooleanIncomparable(): void
    {
        $obj = new Boolean(true);
        $this->expectException('Phrity\Comparison\IncomparableException');
        $this->expectExceptionMessage('Can only compare O\Boolean');
        $obj->compare('Not comparable with O\Boolean');
    }

    /**
     * Test Queue failed comparison
     */
    public function testQueueIncomparable(): void
    {
        $queue = new Queue([1, 2, 3]);
        $this->expectException('Phrity\Comparison\IncomparableException');
        $this->expectExceptionMessage('Can only compare O\Queue');
        $queue->compare('Not comparable with O\Queue');
    }

    /**
     * Test Stack failed comparison
     */
    public function testStackIncomparable(): void
    {
        $stack = new Stack([1, 2, 3]);
        $this->expectException('Phrity\Comparison\IncomparableException');
        $this->expectExceptionMessage('Can only compare O\Stack');
        $stack->compare('Not comparable with O\Stack');
    }
}
