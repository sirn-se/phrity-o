<?php

declare(strict_types=1);

namespace Phrity\O\Test\Array;

use PHPUnit\Framework\TestCase;

/**
 * Phrity\O\Array\ArrayAccessTrait tests.
 */
class ArrayAccessTest extends TestCase
{
    public function setUp(): void
    {
        error_reporting(-1);
    }

    public function testArrayAccessImplementation(): void
    {
        $array = new ImplClass([1, 2, 3]);

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

    public function testArrayAccessMagic(): void
    {
        $array = new ImplClass([1, 2, 3]);

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

    public function testUndefinedOffset(): void
    {
        $array = new ImplClass([1, 2, 3]);
        $this->expectException('OutOfBoundsException');
        $this->expectExceptionMessage("Array offset '4' is out of bounds.");
        $array->offsetGet(4);
    }

    public function testUndefinedOffsetSupressError(): void
    {
        $array = new ImplClass([1, 2, 3], false, true);
        $this->assertNull($array->offsetGet(4));
    }
}
