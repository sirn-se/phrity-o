<?php
/**
 * File for O\Obj tests.
 * @package Phrity > Util > Numerics
 */
namespace Phrity\O;

use Phrity\O\Obj;

/**
 * O\Obj tests.
 */
class ObjTest extends \PHPUnit_Framework_TestCase
{

    /**
     * Set up for all tests
     */
    public function setUp()
    {
        error_reporting(-1);
    }

    /**
     * Test constructor
     */
    public function testConstructor()
    {
        $obj_1 = new Obj();
        $this->assertFalse(isset($obj_1->a));

        $obj_2 = new Obj(['a' => 1, 'b' => 2]);
        $this->assertEquals(2, $obj_2->b);

        $obj_3 = new Obj($obj_2);
        $this->assertEquals(2, $obj_2->b);

        $class = new \stdclass;
        $class->c = 3;
        $obj_4 = new Obj($class);
        $this->assertEquals(3, $obj_4->c);

        $obj_5 = new Obj(['a', 'b', 'c']);
        $this->assertEquals('c', $obj_5->{2});
    }

    /**
     * Test property methods
     */
    public function testPropertyMethods()
    {
        $obj = new Obj(['a' => 1, 'b' => 2, 'c' => null, 'd' => []]);
        $this->assertEquals(1, $obj->__get('a'));
        $this->assertNull($obj->__set('a', 'hello'));
        $this->assertEquals('hello', $obj->__get('a'));
        $this->assertTrue($obj->__isset('a'));
        $this->assertNull($obj->__unset('a'));
        $this->assertFalse($obj->__isset('a'));
    }

    /**
     * Test magic methods
     */
    public function testMagicMethods()
    {
        $obj = new Obj(['a' => 1, 'b' => 2, 'c' => null, 'd' => []]);
        $this->assertEquals(1, $obj->a);
        $obj->a = 'hello';
        $this->assertEquals('hello', $obj->a);
        $this->assertTrue(isset($obj->a));
        unset($obj->a);
        $this->assertFalse(isset($obj->a));
    }

    /**
     * Test toString method
     */
    public function testToString()
    {
        $obj = new Obj(['a' => 1, 'b' => 2, 'c' => null, 'd' => []]);
        $this->assertEquals('Phrity\O\Obj', "{$obj}");
    }
}
