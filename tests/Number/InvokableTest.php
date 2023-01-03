<?php

declare(strict_types=1);

namespace Phrity\O\Test\Number;

use PHPUnit\Framework\TestCase;

/**
 * Phrity\O\Number\InvokableTrait tests.
 */
class InvokableTest extends TestCase
{
    public function setUp(): void
    {
        error_reporting(-1);
    }

    public function testInput(): void
    {
        $float = new ImplClass(2.3);
        $this->assertSame(2.3, $float());
        $this->assertSame(-6.4, $float(-6.4));
    }

    public function testZeroInput(): void
    {
        $float = new ImplClass(0.0);
        $this->assertSame(0.0, $float());
        $this->assertSame(0.0, $float(0.0));
    }

    public function testSetterException(): void
    {
        $int = new ImplClass(2.3);
        $this->expectException('TypeError');
        $this->expectExceptionMessage('Phrity\O\Test\Number\ImplClass::__invoke()');
        $int('not a float');
    }
}
