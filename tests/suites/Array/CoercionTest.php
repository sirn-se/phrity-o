<?php

declare(strict_types=1);

namespace Phrity\O\Test\Array;

use PHPUnit\Framework\TestCase;

/**
 * Phrity\O\Array\CoercionTrait tests.
 */
class CoercionTest extends TestCase
{
    public function setUp(): void
    {
        error_reporting(-1);
    }

    public function testDirect(): void
    {
        $array = new ImplClass([], false);
        $this->assertEquals([], $array->testCoercion([]));
        $this->assertEquals([0 => 1], $array->testCoercion([1]));
        $this->assertEquals(['a' => 1], $array->testCoercion(['a' => 1]));
    }

    public function testCoercion(): void
    {
        $array = new ImplClass([], true);
        $this->assertEquals([], $array->testCoercion(null));
        $this->assertEquals(['a' => 1], $array->testCoercion(new ImplClass(['a' => 1])));
        $this->assertEquals(['a' => 1], $array->testCoercion((object)['a' => 1]));
    }

    public function testFailedCoercion(): void
    {
        $array = new ImplClass([], true);
        $this->expectException('TypeError');
        $this->expectExceptionMessage('Input must be usable as type array.');
        $array->testCoercion(123.45);
    }

    public function testInvalidNullCoercion(): void
    {
        $array = new ImplClass([], false);
        $this->expectException('TypeError');
        $this->expectExceptionMessage('Input must be of type array.');
        $array->testCoercion(null);
    }

    public function testInvalidClassCoercion(): void
    {
        $array = new ImplClass([], false);
        $this->expectException('TypeError');
        $this->expectExceptionMessage('Input must be of type array.');
        $array->testCoercion(new ImplClass([]));
    }

    public function testInvalidObjectCoercion(): void
    {
        $array = new ImplClass([], false);
        $this->expectException('TypeError');
        $this->expectExceptionMessage('Input must be of type array.');
        $array->testCoercion((object)[]);
    }
}
