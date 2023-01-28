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
        $int = new ImplClass((object)[], false);
        $this->assertEquals((object)[], $int->testCoercion(new stdClass()));
    }

    public function testCoercion(): void
    {
        $int = new ImplClass((object)[], true);
        $this->assertEquals((object)[], $int->testCoercion(new stdClass()));
        $this->assertEquals((object)[], $int->testCoercion(null));
        $this->assertEquals((object)['a' => 1], $int->testCoercion(['a' => 1]));
        $this->assertEquals((object)['a' => 1], $int->testCoercion(new ImportClass()));
        $this->assertEquals((object)['a' => 1], $int->testCoercion(new ImplClass((object)['a' => 1])));
    }

    public function testFailedCoercion(): void
    {
        $int = new ImplClass((object)[], true);
        $this->expectException('TypeError');
        $this->expectExceptionMessage('Input must be usable as type object.');
        $int->testCoercion(123.45);
    }


    public function testInvalidNullCoercion(): void
    {
        $int = new ImplClass((object)[], false);
        $this->expectException('TypeError');
        $this->expectExceptionMessage('Input must be of type object.');
        $int->testCoercion(null);
    }

    public function testInvalidArrayCoercion(): void
    {
        $int = new ImplClass((object)[], false);
        $this->expectException('TypeError');
        $this->expectExceptionMessage('Input must be of type object.');
        $int->testCoercion(['a' => 1]);
    }

    public function testInvalidClassCoercion(): void
    {
        $int = new ImplClass((object)[], false);
        $this->expectException('TypeError');
        $this->expectExceptionMessage('Input must be of type object.');
        $int->testCoercion(new ImplClass((object)[]));
    }

    public function testInvalidObjectCoercion(): void
    {
        $int = new ImplClass((object)[], false);
        $this->expectException('TypeError');
        $this->expectExceptionMessage('Input must be of type object.');
        $int->testCoercion(new ImportClass());
    }
}
