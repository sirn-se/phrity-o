<?php

/**
 * File for O\Boolean\StringableTrait tests.
 * @package Phrity > O
 */

declare(strict_types=1);

namespace Phrity\O\Test\Boolean;

use Phrity\O\Test\Boolean\StringableTraitClass;
use PHPUnit\Framework\TestCase;

/**
 * O\Boolean\StringableTrait tests.
 */
class StringableTraitTest extends TestCase
{
    /**
     * Set up for all tests
     */
    public function setUp(): void
    {
        error_reporting(-1);
    }

    /**
     * Test toString method
     */
    public function testToString(): void
    {
        $bool = new StringableTraitClass(false);
        $this->assertEquals('false', "{$bool}");
        $bool = new StringableTraitClass(true);
        $this->assertEquals('true', "{$bool}");
    }
}
