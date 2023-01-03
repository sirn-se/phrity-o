<?php

declare(strict_types=1);

namespace Phrity\O\Test\String;

use PHPUnit\Framework\TestCase;

/**
 * Phrity\O\String\CoercionTrait tests.
 */
class CoercionTest extends TestCase
{
    public function setUp(): void
    {
        error_reporting(-1);
    }

    public function testDirect(): void
    {
        $str = new ImplClass('hey', false);
        $this->assertEquals('hey', $str->testCoercion('hey'));
    }

    public function testCoercion(): void
    {
        $str = new ImplClass('', true);
        $this->assertEquals('123', $str->testCoercion(123));
        $this->assertEquals('', $str->testCoercion(null));
        $this->assertEquals('', $str->testCoercion(false));
        $this->assertEquals('1', $str->testCoercion(true));
        $this->assertEquals('hey', $str->testCoercion(new ImplClass('hey')));
        $this->assertEquals('import class', $str->testCoercion(new ImportClass()));
    }

    public function testFailedClassCoercion(): void
    {
        $str = new ImplClass('', true);
        $this->expectException('TypeError');
        $this->expectExceptionMessage('Input must be usable as type string.');
        $str->testCoercion((object)['a' => 1]);
    }

    public function testInvalidFloatCoercion(): void
    {
        $str = new ImplClass('', false);
        $this->expectException('TypeError');
        $this->expectExceptionMessage('Input must be of type string.');
        $str->testCoercion(123.0);
    }

    public function testInvalidClassCoercion(): void
    {
        $str = new ImplClass('', false);
        $this->expectException('TypeError');
        $this->expectExceptionMessage('Input must be of type string.');
        $str->testCoercion(new ImplClass('no'));
    }

    public function testInvalidNullCoercion(): void
    {
        $str = new ImplClass('', false);
        $this->expectException('TypeError');
        $this->expectExceptionMessage('Input must be of type string.');
        $str->testCoercion(null);
    }
}
