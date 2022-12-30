<?php

/**
 * File for O\Integer\InvokableTrait tests.
 * @package Phrity > O
 */

declare(strict_types=1);

namespace Phrity\O\Test\Integer;

use Phrity\O\Test\Integer\InvokableTrait;
use PHPUnit\Framework\TestCase;

/**
 * O\Integer\InvokableTrait tests.
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
        $int = new InvokableTraitClass(23);
        $this->assertSame(23, $int());
        $this->assertSame(-64, $int(-64));
    }

    /**
     * Test setter with bad input data.
     */
    public function testSetterException(): void
    {
        $int = new InvokableTraitClass(23);
        $this->expectException('TypeError');
        $this->expectExceptionMessage('Phrity\O\Test\Integer\InvokableTraitClass::__invoke()');
        $int('not an integer');
    }
}
