<?php

declare(strict_types=1);

namespace Phrity\O\Test\Integer;

use PHPUnit\Framework\TestCase;

/**
 * Phrity\O\Integer\InvokableTrait tests.
 */
class InvokableTest extends TestCase
{
    public function setUp(): void
    {
        error_reporting(-1);
    }

    public function testInput(): void
    {
        $int = new ImplClass(23);
        $this->assertSame(23, $int());
        $this->assertSame(-64, $int(-64));
    }

    public function testZeroInput(): void
    {
        $int = new ImplClass(0);
        $this->assertSame(0, $int());
        $this->assertSame(0, $int(0));
    }

    public function testSetterException(): void
    {
        $int = new ImplClass(23);
        $this->expectException('TypeError');
        $this->expectExceptionMessage('Phrity\O\Test\Integer\ImplClass::__invoke()');
        $int('not an integer');
    }

    public function testArgumentCountError(): void
    {
        $int = new ImplClass(23);
        $this->expectException('ArgumentCountError');
        $this->expectExceptionMessage('Too many arguments.');
        $int(0, 0);
    }
}
