<?php

namespace Phrity\O;

use Phrity\O\Obj;

class ObjPropertyAccessTest extends \PHPUnit_Framework_TestCase
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
        $obj_1 = new Obj();
        $this->assertFalse(isset($obj_1->a));

        $obj_2 = new Obj(['a' => 1, 'b' => 2]);
        $this->assertEquals(2, $obj_2->b);

        $class = new \stdclass;
        $class->c = 3;
        $obj_3 = new Obj($class);
        $this->assertEquals(3, $obj_3->c);
    }

    public function testPropertyMethods()
    {
        $obj = new Obj(['a' => 1, 'b' => 2, 'c' => null, 'd' => []]);
        $this->assertEquals(1, $obj->__get('a'));
        $this->assertEquals(2, $obj->b);
        $this->assertNull($obj->c);
        $this->assertEquals([], $obj->d);
        $this->assertNull($obj->__set('a', 'hello'));
        $this->assertEquals('hello', $obj->a);
        $this->assertNull($obj->c ='hej');
        $this->assertEquals('hej', $obj->b);


    }

    public function testMagicMethods()
    {
      $obj = new Obj(['a' => 1, 'b' => 2, 'c' => null, 'd' => []]);
        $this->assertEquals(1, $obj->__get('a'));
        $this->assertEquals(2, $obj->b);
        $this->assertNull($obj->c);
        $this->assertEquals([], $obj->d);
        $this->assertNull($obj->__set('a', 'hello'));
        $this->assertEquals('hello', $obj->a);
        $this->assertNull($obj->c ='hej');
        $this->assertEquals('hej', $obj->b);
    }

}
/*
    public function __get($key)
    {
      return $this->o_content->$key;
    }

    public function __set($key, $value)
    {
      $this->o_content->$key = $value;
    }

    public function __isset($key)
    {
      return isset($this->o_content->$key);
    }

    public function __unset($key)
    {
      unset($this->o_content->$key);
    }
*/