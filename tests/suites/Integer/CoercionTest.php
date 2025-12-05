<?php

declare(strict_types=1);

namespace Phrity\O\Test\Integer;

use PHPUnit\Framework\TestCase;

/**
 * Phrity\O\Integer\CoercionTrait tests.
 */
class CoercionTest extends TestCase
{
    public function setUp(): void
    {
        error_reporting(-1);
    }

    public function testDirect(): void
    {
        $int = new ImplClass(0, false);
        $this->assertEquals(123, $int->testCoercion(123));
    }

    public function testCoercion(): void
    {
        $int = new ImplClass(0, true);
        $this->assertEquals(123, $int->testCoercion(123));
        $this->assertEquals(123, $int->testCoercion('123'));
        $this->assertEquals(123, $int->testCoercion(123.0));
        $this->assertEquals(123, $int->testCoercion(new ImplClass(123)));
        $this->assertEquals(0, $int->testCoercion(null));
    }

    public function testFailedFloatCoercion(): void
    {
        $int = new ImplClass(0, true);
        $this->expectException('TypeError');
        $this->expectExceptionMessage('Input must be usable as type int.');
        $int->testCoercion(123.45);
    }

    public function testFailedStringCoercion(): void
    {
        $int = new ImplClass(0, true);
        $this->expectException('TypeError');
        $this->expectExceptionMessage('Input must be usable as type int.');
        $int->testCoercion('not an integer');
    }

    public function testFailedClassCoercion(): void
    {
        $int = new ImplClass(0, true);
        $this->expectException('TypeError');
        $this->expectExceptionMessage('Input must be usable as type int.');
        $int->testCoercion((object)['a' => 1]);
    }

    public function testInvalidFloatCoercion(): void
    {
        $int = new ImplClass(0, false);
        $this->expectException('TypeError');
        $this->expectExceptionMessage('Input must be of type int.');
        $int->testCoercion(123.0);
    }

    public function testInvalidStringCoercion(): void
    {
        $int = new ImplClass(0, false);
        $this->expectException('TypeError');
        $this->expectExceptionMessage('Input must be of type int.');
        $int->testCoercion('123');
    }

    public function testInvalidClassCoercion(): void
    {
        $int = new ImplClass(0, false);
        $this->expectException('TypeError');
        $this->expectExceptionMessage('Input must be of type int.');
        $int->testCoercion(new ImplClass(123));
    }

    public function testInvalidNullCoercion(): void
    {
        $int = new ImplClass(0, false);
        $this->expectException('TypeError');
        $this->expectExceptionMessage('Input must be of type int.');
        $int->testCoercion(null);
    }
}
