<?php

declare(strict_types=1);

namespace Phrity\O\Test\Object;

use PHPUnit\Framework\TestCase;
use stdClass;

/**
 * Phrity\O\Object\CoercionTrait tests.
 */
class CoercionTest extends TestCase
{
    public function setUp(): void
    {
        error_reporting(-1);
    }

    public function testDirect(): void
    {
        $object = new ImplClass((object)[], false);
        $this->assertEquals((object)[], $object->testCoercion(new stdClass()));
    }

    public function testCoercion(): void
    {
        $object = new ImplClass((object)[], true);
        $this->assertEquals((object)[], $object->testCoercion(new stdClass()));
        $this->assertEquals((object)[], $object->testCoercion(null));
        $this->assertEquals((object)['a' => 1], $object->testCoercion(['a' => 1]));
        $this->assertEquals((object)['a' => 1], $object->testCoercion(new ImportClass()));
        $this->assertEquals((object)['a' => 1], $object->testCoercion(new ImplClass((object)['a' => 1])));
    }

    public function testFailedCoercion(): void
    {
        $object = new ImplClass((object)[], true);
        $this->expectException('TypeError');
        $this->expectExceptionMessage('Input must be usable as type object.');
        $object->testCoercion(123.45);
    }


    public function testInvalidNullCoercion(): void
    {
        $object = new ImplClass((object)[], false);
        $this->expectException('TypeError');
        $this->expectExceptionMessage('Input must be of type object.');
        $object->testCoercion(null);
    }

    public function testInvalidArrayCoercion(): void
    {
        $object = new ImplClass((object)[], false);
        $this->expectException('TypeError');
        $this->expectExceptionMessage('Input must be of type object.');
        $object->testCoercion(['a' => 1]);
    }

    public function testInvalidClassCoercion(): void
    {
        $object = new ImplClass((object)[], false);
        $this->expectException('TypeError');
        $this->expectExceptionMessage('Input must be of type object.');
        $object->testCoercion(new ImplClass((object)[]));
    }

    public function testInvalidObjectCoercion(): void
    {
        $object = new ImplClass((object)[], false);
        $this->expectException('TypeError');
        $this->expectExceptionMessage('Input must be of type object.');
        $object->testCoercion(new ImportClass());
    }
}
