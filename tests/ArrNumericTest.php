<?php

namespace Phrity\O;

use Phrity\O\Arr;

class ArrNumericTest extends \PHPUnit_Framework_TestCase
{

    public function setUp()
    {
        error_reporting(-1);
    }

    /**
     * Test constructor
     */
    public function testConstructor()
    {
        $array_1 = new Arr();
        $this->assertEquals(0, $array_1->count());

        $array_2 = new Arr([1, 2, 3]);
        $this->assertEquals(2, $array_2[1]);

        $array_3 = new Arr(['a' => 1, 'b' => 2, 'c' => 3]);
        $this->assertEquals(2, $array_3['b']);

        $array_4 = new Arr($array_3);
        $this->assertEquals(2, $array_4['b']);
    }

    /**
     * Test constructor
     * @expectedException InvalidArgumentException
     * @expectedExceptionMessage Unsupported argument for O\Arr
     */
    public function testConstructorArgumentType()
    {
        $array = new Arr('unsupported');
    }

    /**
     * Test constructor
     * @expectedException InvalidArgumentException
     * @expectedExceptionMessage Unsupported argument for O\Arr
     */
    public function testConstructorArgumentCount()
    {
        $array = new Arr([1, 2, 3], 'unsupported');
    }

    /**
     * Test implementation of Countable interface
     */
    public function testCountableImplementation()
    {
        $array = new Arr([1, 2, 3]);
        $this->assertEquals(3, $array->count());
    }

    /**
     * Test implementation of ArrayAccess interface
     */
    public function testArrayAccessImplementation()
    {
        $array = new Arr([1, 2, 3]);

        $this->assertTrue($array->offsetExists(0));
        $this->assertTrue($array->offsetExists(1));
        $this->assertTrue($array->offsetExists(2));
        $this->assertFalse($array->offsetExists(3));

        $this->assertTrue(isset($array[0]));
        $this->assertTrue(isset($array[1]));
        $this->assertTrue(isset($array[2]));
        $this->assertFalse(isset($array[3]));

        $this->assertEquals(1, $array->offsetGet(0));
        $this->assertEquals(2, $array->offsetGet(1));
        $this->assertEquals(3, $array->offsetGet(2));

        $this->assertEquals(1, $array[0]);
        $this->assertEquals(2, $array[1]);
        $this->assertEquals(3, $array[2]);

        $array->offsetSet(0, 10);
        $this->assertEquals(10, $array->offsetGet(0));
        $array->offsetSet(null, 10);
        $this->assertEquals(10, $array->offsetGet(3));

        $array[0] = 20;
        $this->assertEquals(20, $array[0]);
        $array[] = 20;
        $this->assertEquals(20, $array[4]);

        $array->offsetUnset(0);
        $this->assertFalse(isset($array[0]));
        unset($array[1]);
        $this->assertFalse(isset($array[1]));
    }

    /**
     * Test implementation of Iterator interface
     */
    public function testIteratorImplementation()
    {
        $array = new Arr([1, 2, 3]);

        $this->assertEquals(1, $array->current());
        $this->assertEquals(0, $array->key());
        $this->assertTrue($array->valid());
        $array->next();
        $this->assertEquals(1, $array->key());
        $array->rewind();
        $this->assertEquals(0, $array->key());

        foreach ($array as $key => $value) {
            $this->assertEquals($key + 1, $value);
        }
    }

    /**
     * Test get on undefined index; generates a notice
     * @expectedException PHPUnit_Framework_Error_Notice
     * @expectedExceptionMessage Undefined offset: 4
     */
    public function testUndefinedOffset()
    {
        $array = new Arr([1, 2, 3]);
        $array->offsetGet(4);
    }
}
