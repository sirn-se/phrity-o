<?php

declare(strict_types=1);

namespace Phrity\O\Test\Boolean;

use PHPUnit\Framework\TestCase;

/**
 * Phrity\O\Boolean\InvokableTrait tests.
 */
class InvokableTest extends TestCase
{
    public function setUp(): void
    {
        error_reporting(-1);
    }

    public function testFalseInput(): void
    {
        $bool = new ImplClass(false);
        $this->assertSame(false, $bool());
        $this->assertSame(true, $bool(true));
    }

    public function testTrueInput(): void
    {
        $bool = new ImplClass(true);
        $this->assertSame(true, $bool());
        $this->assertSame(false, $bool(false));
    }

    public function testSetterException(): void
    {
        $bool = new ImplClass(false);
        $this->expectException('TypeError');
        $this->expectExceptionMessage('Phrity\O\Test\Boolean\ImplClass::__invoke()');
        $bool('not a boolean');
    }

    public function testArgumentCountError(): void
    {
        $bool = new ImplClass(false);
        $this->expectException('ArgumentCountError');
        $this->expectExceptionMessage('Too many arguments.');
        $bool(true, true);
    }
}
