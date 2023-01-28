<?php

declare(strict_types=1);

namespace Phrity\O\Test\Number;

use PHPUnit\Framework\TestCase;

/**
 * Phrity\O\Number\CoercionTrait tests.
 */
class CoercionTest extends TestCase
{
    public function setUp(): void
    {
        error_reporting(-1);
    }

    public function testDirect(): void
    {
        $float = new ImplClass(0.0, false);
        $this->assertEquals(123.45, $float->testCoercion(123.45));
    }

    public function testCoercion(): void
    {
        $float = new ImplClass(0.0, true);
        $this->assertEquals(123.45, $float->testCoercion(123.45));
        $this->assertEquals(123.45, $float->testCoercion('123.45'));
        $this->assertEquals(123.0, $float->testCoercion(123));
        $this->assertEquals(123.45, $float->testCoercion(new ImplClass(123.45)));
        $this->assertEquals(0.0, $float->testCoercion(null));
    }

    public function testFailedStringCoercion(): void
    {
        $float = new ImplClass(0.0, true);
        $this->expectException('TypeError');
        $this->expectExceptionMessage('Input must be usable as type float.');
        $float->testCoercion('not a float');
    }

    public function testFailedClassCoercion(): void
    {
        $float = new ImplClass(0.0, true);
        $this->expectException('TypeError');
        $this->expectExceptionMessage('Input must be usable as type float.');
        $float->testCoercion((object)['a' => 1]);
    }

    public function testInvalidStringCoercion(): void
    {
        $float = new ImplClass(0.0, false);
        $this->expectException('TypeError');
        $this->expectExceptionMessage('Input must be of type float.');
        $float->testCoercion('123.45');
    }

    public function testInvalidClassCoercion(): void
    {
        $float = new ImplClass(0.0, false);
        $this->expectException('TypeError');
        $this->expectExceptionMessage('Input must be of type float.');
        $float->testCoercion(new ImplClass(123.45));
    }

    public function testInvalidNullCoercion(): void
    {
        $float = new ImplClass(0.0, false);
        $this->expectException('TypeError');
        $this->expectExceptionMessage('Input must be of type float.');
        $float->testCoercion(null);
    }
}
