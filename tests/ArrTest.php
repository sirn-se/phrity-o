<?php

/**
 * File for generic O\Arr tests.
 * @package Phrity > O
 */

declare(strict_types=1);

namespace Phrity\O;

use Phrity\O\Arr;

/**
 * Generic O\Arr tests.
 */
class ArrTest extends \PHPUnit\Framework\TestCase
{

    /**
     * Set up for all tests
     */
    public function setUp(): void
    {
        error_reporting(-1);
    }


    // Test constructor

    /**
     * Test constructor w/ associative arrays
     */
    public function testAssociativeConstructor(): void
    {
        $array_1 = new Arr();
        $this->assertEquals(0, $array_1->count());

        $array_2 = new Arr(['a' => 1, 'b' => 2, 'c' => 3]);
        $this->assertEquals(2, $array_2['b']);

        $array_3 = new Arr($array_2);
        $this->assertEquals(2, $array_3['b']);

        $class = new \stdclass();
        $class->c = 3;
        $array_4 = new Arr($class);
        $this->assertEquals(3, $array_3['c']);
    }

    /**
     * Test constructor w/ numeric arrays
     */
    public function testNumericConstructor(): void
    {
        $array_1 = new Arr();
        $this->assertEquals(0, $array_1->count());

        $array_2 = new Arr([1, 2, 3]);
        $this->assertEquals(2, $array_2[1]);

        $array_3 = new Arr($array_2);
        $this->assertEquals(2, $array_3[1]);
    }

    /**
     * Test constructor w/ bad input data
     */
    public function testConstructorArgumentType(): void
    {
        $this->expectException('InvalidArgumentException');
        $this->expectExceptionMessage('Unsupported input data for O\Arr');
        $array = new Arr('unsupported');
    }

    /**
     * Test constructor w/ bad argument
     */
    public function testConstructorArgumentCount(): void
    {
        $this->expectException('InvalidArgumentException');
        $this->expectExceptionMessage('Unsupported argument for O\Arr');
        $array = new Arr([1, 2, 3], 'unsupported');
    }


    // Test Countable interface

    /**
     * Test implementation of Countable interface
     */
    public function testCountableImplementation(): void
    {
        $array = new Arr([1, 2, 3]);
        $this->assertEquals(3, $array->count());
    }


    // Test ArrayAccess interface

    /**
     * Test implementation of ArrayAccess interface
     */
    public function testArrayAccessImplementation(): void
    {
        $array = new Arr([1, 2, 3]);

        $this->assertTrue($array->offsetExists(0));
        $this->assertTrue($array->offsetExists(1));
        $this->assertTrue($array->offsetExists(2));
        $this->assertFalse($array->offsetExists(3));

        $this->assertEquals(1, $array->offsetGet(0));
        $this->assertEquals(2, $array->offsetGet(1));
        $this->assertEquals(3, $array->offsetGet(2));

        $array->offsetSet(0, 10);
        $this->assertEquals(10, $array->offsetGet(0));
        $array->offsetSet(null, 10);
        $this->assertEquals(10, $array->offsetGet(3));

        $array->offsetUnset(0);
        $this->assertFalse($array->offsetExists(0));
    }

    /**
     * Test magic access of ArrayAccess interface
     */
    public function testArrayAccessMagic(): void
    {
        $array = new Arr([1, 2, 3]);

        $this->assertTrue(isset($array[0]));
        $this->assertTrue(isset($array[1]));
        $this->assertTrue(isset($array[2]));
        $this->assertFalse(isset($array[3]));

        $this->assertEquals(1, $array[0]);
        $this->assertEquals(2, $array[1]);
        $this->assertEquals(3, $array[2]);

        $array[0] = 20;
        $this->assertEquals(20, $array[0]);
        $array[] = 20;
        $this->assertEquals(20, $array[3]);

        unset($array[1]);
        $this->assertFalse(isset($array[1]));
    }

    /**
     * Test get on undefined index; generates a notice
     */
    public function testUndefinedOffset(): void
    {
        $array = new Arr([1, 2, 3]);
        $this->expectException('PHPUnit\Framework\Error\Error');
        $this->expectExceptionMessage('Undefined array key: 4');
        $array->offsetGet(4);
    }


    // Test Iterator interface

    /**
     * Test implementation of Iterator interface
     */
    public function testIteratorImplementation(): void
    {
        $array = new Arr([1, 2, 3]);

        $this->assertEquals(1, $array->current());
        $this->assertEquals(0, $array->key());
        $this->assertTrue($array->valid());
        $array->next();
        $this->assertEquals(1, $array->key());
        $array->rewind();
        $this->assertEquals(0, $array->key());
    }

    /**
     * Test magic access of Iterator interface
     */
    public function testIteratorMagic(): void
    {
        $array = new Arr([1, 2, 3]);

        foreach ($array as $key => $value) {
            $this->assertEquals($key + 1, $value);
        }
    }

    /**
     * Test additional iterators
     */
    public function testAdditionalIterators(): void
    {
        $array = new Arr([1, 2, 3]);

        $this->assertFalse($array->previous());
        $this->assertEquals(3, $array->forward());
        $this->assertEquals(2, $array->previous());
    }


    // Test representation methods

    /**
     * Test toString method
     */
    public function testToString(): void
    {
        $obj = new Arr([1, 2, null, []]);
        $this->assertEquals('Phrity\O\Arr(4)', "{$obj}");
    }
}
