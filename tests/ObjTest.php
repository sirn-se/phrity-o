<?php

/**
 * File for O\Obj tests.
 * @package Phrity > O
 */

declare(strict_types=1);

namespace Phrity\O;

use Phrity\O\Obj;

/**
 * O\Obj tests.
 */
class ObjTest extends \PHPUnit\Framework\TestCase
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
     * Test constructor
     */
    public function testConstructor(): void
    {
        $obj_1 = new Obj();
        $this->assertFalse(isset($obj_1->a));

        $obj_2 = new Obj(['a' => 1, 'b' => 2]);
        $this->assertEquals(2, $obj_2->b);

        $obj_3 = new Obj($obj_2);
        $this->assertEquals(2, $obj_2->b);

        $class = new \stdclass();
        $class->c = 3;
        $obj_4 = new Obj($class);
        $this->assertEquals(3, $obj_4->c);

        $obj_5 = new Obj(['a', 'b', 'c']);
        $this->assertEquals('c', $obj_5->{2});
    }

    /**
     * Test constructor w/ bad input data
     */
    public function testConstructorArgumentType(): void
    {
        $this->expectException('InvalidArgumentException');
        $this->expectExceptionMessage('Unsupported input data for O\Obj');
        $obj = new Obj('unsupported');
    }

    /**
     * Test constructor w/ bad argumenta
     */
    public function testConstructorArgumentCount(): void
    {
        $this->expectException('InvalidArgumentException');
        $this->expectExceptionMessage('Unsupported argument for O\Obj');
        $obj = new Obj(['a' => 1, 'b' => 2], 'unsupported');
    }


    // Test property access methods

    /**
     * Test property methods
     */
    public function testPropertyMethods(): void
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
    public function testMagicMethods(): void
    {
        $obj = new Obj(['a' => 1, 'b' => 2, 'c' => null, 'd' => []]);
        $this->assertEquals(1, $obj->a);
        $obj->a = 'hello';
        $this->assertEquals('hello', $obj->a);
        $this->assertTrue(isset($obj->a));
        unset($obj->a);
        $this->assertFalse(isset($obj->a));
    }


    // Test representation methods

    /**
     * Test toString method
     */
    public function testToString(): void
    {
        $obj = new Obj(['a' => 1, 'b' => 2, 'c' => null, 'd' => []]);
        $this->assertEquals('Phrity\O\Obj', "{$obj}");
    }
}
