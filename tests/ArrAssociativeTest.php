<?php

use Phrity\O\Arr;

class ArrAssociativeTest extends \PHPUnit_Framework_TestCase
{

    /**
     * Test implementation of Countable interface
     */
    public function testCountableImplementation()
    {
        $array = new Arr(['a' => 1, 'b' => 2, 'c' => 3]);
        $this->assertEquals(3, $array->count());
    }

    /**
     * Test implementation of ArrayAccess interface
     */
    public function xtestArrayAccessImplementation()
    {
        $array = new Arr(['a' => 1, 'b' => 2, 'c' => 3]);

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
    }

    /**
     * Test ArrayOutOfBoundsException in ArrayAccess implementation
     * @expectedException \OutOfBoundsException
     */
    public function testArrayOutOfBoundsException()
    {
        $array = new Arr(['a' => 1, 'b' => 2, 'c' => 3]);
        $array->offsetGet(3);
    }

    /**
     * Test implementation of Iterator interface
     */
    public function testIteratorImplementation()
    {
        $array = new Arr(['a' => 1, 'b' => 2, 'c' => 3]);

        $this->assertEquals(1, $array->current());
        $this->assertEquals('a', $array->key());
        $this->assertTrue($array->valid());
        $array->next();
        $this->assertEquals('b', $array->key());
        $array->rewind();
        $this->assertEquals('a', $array->key());

        foreach ($array as $key => $value) {
            $this->assertEquals($array[$key], $value);
        }
    }
}
