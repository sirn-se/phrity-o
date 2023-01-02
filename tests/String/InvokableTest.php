<?php

declare(strict_types=1);

namespace Phrity\O\Test\String;

use PHPUnit\Framework\TestCase;

/**
 * Phrity\O\String\InvokableTrait tests.
 */
class InvokableTraitTest extends TestCase
{
    public function setUp(): void
    {
        error_reporting(-1);
    }

    public function testInput(): void
    {
        $string = new ImplClass('aaa');
        $this->assertSame('aaa', $string());
        $this->assertSame('bbb', $string('bbb'));
    }

    public function testEmptyInput(): void
    {
        $string = new ImplClass('');
        $this->assertSame('', $string());
        $this->assertSame('', $string(''));
    }

    public function testSetterException(): void
    {
        $string = new ImplClass('aaa');
        $this->expectException('TypeError');
        $this->expectExceptionMessage('Phrity\O\Test\String\ImplClass::__invoke()');
        $string(1);
    }
}
