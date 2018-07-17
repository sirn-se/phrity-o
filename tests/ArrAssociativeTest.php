<?php

namespace Phrity\O;

use Phrity\O\Arr;

class ArrAssociativeTest extends \PHPUnit_Framework_TestCase
{

    /**
     * Test implementation of Countable interface
     */
    public function testCountableImplementation()
    {
        error_reporting(-1);
        $array = new Arr(['a' => 1, 'b' => 2, 'c' => 3]);
        $this->assertEquals(3, $array->count());
    }

    /**
     * Test implementation of ArrayAccess interface
     */
    public function testArrayAccessImplementation()
    {
        error_reporting(E_ALL);
        $array = new Arr(['a' => 1, 'b' => 2, 'c' => 3]);

        $this->assertTrue($array->offsetExists('a'));
        $this->assertTrue($array->offsetExists('b'));
        $this->assertTrue($array->offsetExists('c'));
        $this->assertFalse($array->offsetExists('d'));

        $this->assertTrue(isset($array['a']));
        $this->assertTrue(isset($array['b']));
        $this->assertTrue(isset($array['c']));
        $this->assertFalse(isset($array['d']));

        $this->assertEquals(1, $array->offsetGet('a'));
        $this->assertEquals(2, $array->offsetGet('b'));
        $this->assertEquals(3, $array->offsetGet('c'));

        $this->assertEquals(1, $array['a']);
        $this->assertEquals(2, $array['b']);
        $this->assertEquals(3, $array['c']);

        $array->offsetSet('e', 10);
        $this->assertEquals(10, $array->offsetGet('e'));
        $array->offsetSet(null, 10);
        $this->assertEquals(10, $array->offsetGet(0));

        $array['a'] = 20;
        $this->assertEquals(20, $array['a']);
        $array[] = 20;
        $this->assertEquals(20, $array[1]);

        $array->offsetUnset('a');
        $this->assertFalse(isset($array['a']));
        unset($array['b']);
        $this->assertFalse(isset($array['b']));
    }

    /**
     * Test implementation of Iterator interface
     */
    public function testIteratorImplementation()
    {
        error_reporting(E_ALL);
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

    /**
     * Test get on undefined index; generates a notice
     */
    public function testUndefinedOffset()
    {
        error_reporting(E_ALL & ~E_NOTICE);
        $array = new Arr(['a' => 1, 'b' => 2, 'c' => 3]);
        $array->offsetGet('d');
    }
}
