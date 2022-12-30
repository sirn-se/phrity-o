<?php

/**
 * File for O\Number\InvokableTrait tests.
 * @package Phrity > O
 */

declare(strict_types=1);

namespace Phrity\O\Test\Number;

use Phrity\O\Test\Number\InvokableTrait;
use PHPUnit\Framework\TestCase;

/**
 * O\Number\InvokableTrait tests.
 */
class InvokableTraitTest extends TestCase
{
    /**
     * Set up for all tests
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
        $float = new InvokableTraitClass(2.3);
        $this->assertSame(2.3, $float());
        $this->assertSame(-6.4, $float(-6.4));
    }

    /**
     * Test setter with bad input data.
     */
    public function testSetterException(): void
    {
        $int = new InvokableTraitClass(2.3);
        $this->expectException('TypeError');
        $this->expectExceptionMessage('Phrity\O\Test\Number\InvokableTraitClass::__invoke()');
        $int('not a float');
    }
}
