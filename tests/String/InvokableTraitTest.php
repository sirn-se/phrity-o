<?php

/**
 * File for O\String\InvokableTrait tests.
 * @package Phrity > O.
 */

declare(strict_types=1);

namespace Phrity\O\Test\String;

use Phrity\O\Test\String\InvokableTrait;
use PHPUnit\Framework\TestCase;

/**
 * O\String\InvokableTrait tests.
 */
class InvokableTraitTest extends TestCase
{
    /**
     * Set up for all tests.
     */
    public function setUp(): void
    {
        error_reporting(-1);
    }

    /**
     * Test invoke.
     */
    public function testInput(): void
    {
        $string = new InvokableTraitClass('aaa');
        $this->assertSame('aaa', $string());
        $this->assertSame('bbb', $string('bbb'));
    }

    /**
     * Test setter with bad input data.
     */
    public function testSetterException(): void
    {
        $string = new InvokableTraitClass('aaa');
        $this->expectException('TypeError');
        $this->expectExceptionMessage('Phrity\O\Test\String\InvokableTraitClass::__invoke()');
        $string(1);
    }
}
