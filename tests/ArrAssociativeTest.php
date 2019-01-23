<?php

namespace Phrity\O;

use Phrity\O\Arr;

class ArrAssociativeTest extends \PHPUnit_Framework_TestCase
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

        $array_2 = new Arr(['a' => 1, 'b' => 2, 'c' => 3]);
        $this->assertEquals(2, $array_2['b']);

        $array_3 = new Arr($array_2);
        $this->assertEquals(2, $array_3['b']);
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
        $array = new Arr(['a' => 1, 'b' => 2, 'c' => 3]);
        $this->assertEquals(3, $array->count());
    }

    /**
     * Test implementation of ArrayAccess interface
     */
    public function testArrayAccessImplementation()
    {
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
     * @expectedException PHPUnit_Framework_Error_Notice
     * @expectedExceptionMessage Undefined index: d
     */
    public function testUndefinedOffset()
    {
        $array = new Arr(['a' => 1, 'b' => 2, 'c' => 3]);
        $array->offsetGet('d');
    }

    public function testAdditionalIterators()
    {
        $array = new Arr(['a' => 1, 'b' => 2, 'c' => 3]);

        $this->assertFalse($array->previous());
        $this->assertEquals(3, $array->forward());
        $this->assertEquals(2, $array->previous());
    }
}
