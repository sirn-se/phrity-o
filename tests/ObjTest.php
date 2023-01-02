<?php

declare(strict_types=1);

namespace Phrity\O;

use PHPUnit\Framework\TestCase;
use Phrity\O\Obj;
use stdClass;

/**
 * O\Obj tests.
 */
class ObjTest extends TestCase
{
    public function setUp(): void
    {
        error_reporting(-1);
    }

    public function testClass(): void
    {
        $obj = new Obj();
        $this->assertInstanceOf('Phrity\Comparison\Comparable', $obj);
        $this->assertInstanceOf('Stringable', $obj);
        $this->assertIsCallable([$obj, 'compare'], 'ComparableTrait->compare not callable');
        $this->assertIsCallable([$obj, '__toString'], 'StringableTrait->__toString not callable');
    }

    public function testConstructor(): void
    {
        $obj_1 = new Obj();
        $this->assertFalse(isset($obj_1->a));

        $obj_2 = new Obj(['a' => 1, 'b' => 2]);
        $this->assertEquals(2, $obj_2->b);

        $obj_3 = new Obj($obj_2);
        $this->assertEquals(2, $obj_2->b);

        $obj_4 = new Obj(new stdClass());
        $this->assertFalse(isset($obj_5->a));

        $obj_5 = new Obj(null);
        $this->assertFalse(isset($obj_5->a));
    }

    public function testConstructorArgumentType(): void
    {
        $this->expectException('TypeError');
        $this->expectExceptionMessage('Input must be usable as type object.');
        $obj = new Obj('unsupported');
    }

    public function testConstructorArgumentCount(): void
    {
        $this->expectException('ArgumentCountError');
        $this->expectExceptionMessage('Unsupported argument for Phrity\O\Obj.');
        $obj = new Obj(['a' => 1, 'b' => 2], 'unsupported');
    }
}
