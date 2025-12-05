<?php

declare(strict_types=1);

namespace Phrity\O\Test\Boolean;

use PHPUnit\Framework\TestCase;

/**
 * Phrity\O\Boolean\CoercionTrait tests.
 */
class CoercionTest extends TestCase
{
    public function setUp(): void
    {
        error_reporting(-1);
    }

    public function testDirect(): void
    {
        $bool = new ImplClass(false, false);
        $this->assertEquals(false, $bool->testCoercion(false));
        $this->assertEquals(true, $bool->testCoercion(true));
    }

    public function testCoercion(): void
    {
        $bool = new ImplClass(false, true);
        $this->assertEquals(false, $bool->testCoercion(0));
        $this->assertEquals(true, $bool->testCoercion(1));
        $this->assertEquals(true, $bool->testCoercion(-1));
        $this->assertEquals(false, $bool->testCoercion('0'));
        $this->assertEquals(true, $bool->testCoercion(new ImplClass(true)));
        $this->assertEquals(false, $bool->testCoercion(null));
    }

    public function testFailedStringCoercion(): void
    {
        $bool = new ImplClass(false, true);
        $this->expectException('TypeError');
        $this->expectExceptionMessage('Input must be usable as type bool.');
        $bool->testCoercion('not an integer');
    }

    public function testFailedClassCoercion(): void
    {
        $bool = new ImplClass(false, true);
        $this->expectException('TypeError');
        $this->expectExceptionMessage('Input must be usable as type bool.');
        $bool->testCoercion((object)['a' => 1]);
    }

    public function testInvalidFloatCoercion(): void
    {
        $bool = new ImplClass(false, false);
        $this->expectException('TypeError');
        $this->expectExceptionMessage('Input must be of type bool.');
        $bool->testCoercion(123.0);
    }

    public function testInvalidStringCoercion(): void
    {
        $bool = new ImplClass(false, false);
        $this->expectException('TypeError');
        $this->expectExceptionMessage('Input must be of type bool.');
        $bool->testCoercion('123');
    }

    public function testInvalidClassCoercion(): void
    {
        $bool = new ImplClass(false, false);
        $this->expectException('TypeError');
        $this->expectExceptionMessage('Input must be of type bool.');
        $bool->testCoercion(new ImplClass(true));
    }

    public function testInvalidNullCoercion(): void
    {
        $bool = new ImplClass(false, false);
        $this->expectException('TypeError');
        $this->expectExceptionMessage('Input must be of type bool.');
        $bool->testCoercion(null);
    }
}
