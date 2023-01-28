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
        $arr = new ImplClass([], false);
        $this->assertEquals([], $arr->testCoercion([]));
        $this->assertEquals([0 => 1], $arr->testCoercion([1]));
        $this->assertEquals(['a' => 1], $arr->testCoercion(['a' => 1]));
    }

    public function testCoercion(): void
    {
        $arr = new ImplClass([], true);
        $this->assertEquals([], $arr->testCoercion(null));
        $this->assertEquals(['a' => 1], $arr->testCoercion(new ImplClass(['a' => 1])));
        $this->assertEquals(['a' => 1], $arr->testCoercion((object)['a' => 1]));
    }

    public function testFailedCoercion(): void
    {
        $arr = new ImplClass([], true);
        $this->expectException('TypeError');
        $this->expectExceptionMessage('Input must be usable as type array.');
        $arr->testCoercion(123.45);
    }

    public function testInvalidNullCoercion(): void
    {
        $arr = new ImplClass([], false);
        $this->expectException('TypeError');
        $this->expectExceptionMessage('Input must be of type array.');
        $arr->testCoercion(null);
    }

    public function testInvalidClassCoercion(): void
    {
        $arr = new ImplClass([], false);
        $this->expectException('TypeError');
        $this->expectExceptionMessage('Input must be of type array.');
        $arr->testCoercion(new ImplClass([]));
    }

    public function testInvalidObjectCoercion(): void
    {
        $arr = new ImplClass([], false);
        $this->expectException('TypeError');
        $this->expectExceptionMessage('Input must be of type array.');
        $arr->testCoercion((object)[]);
    }
}
