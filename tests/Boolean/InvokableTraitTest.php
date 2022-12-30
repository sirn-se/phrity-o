<?php

/**
 * File for O\Boolean\InvokableTrait tests.
 * @package Phrity > O
 */

declare(strict_types=1);

namespace Phrity\O\Test\Boolean;

use Phrity\O\Test\Boolean\InvokableTrait;
use PHPUnit\Framework\TestCase;

/**
 * O\Boolean\InvokableTrait tests.
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
     * Test false to true.
     */
    public function testFalseInput(): void
    {
        $bool = new InvokableTraitClass(false);
        $this->assertSame(false, $bool());
        $this->assertSame(true, $bool(true));
    }

    /**
     * Test true to false.
     */
    public function testTrueInput(): void
    {
        $bool = new InvokableTraitClass(true);
        $this->assertSame(true, $bool());
        $this->assertSame(false, $bool(false));
    }

    /**
     * Test setter with bad input data.
     */
    public function testSetterException(): void
    {
        $bool = new InvokableTraitClass(false);
        $this->expectException('TypeError');
        $this->expectExceptionMessage('Phrity\O\Test\Boolean\InvokableTraitClass::__invoke()');
        $bool('not a boolean');
    }
}
