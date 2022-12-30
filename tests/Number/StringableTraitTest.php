<?php

/**
 * File for O\Number\StringableTrait tests.
 * @package Phrity > O.
 */

declare(strict_types=1);

namespace Phrity\O\Test\Number;

use Phrity\O\Test\Number\StringableTraitClass;
use PHPUnit\Framework\TestCase;

/**
 * O\Number\StringableTrait tests.
 */
class StringableTraitTest extends TestCase
{
    /**
     * Set up for all tests.
     */
    public function setUp(): void
    {
        error_reporting(-1);
    }

    /**
     * Test toString method.
     */
    public function testToString(): void
    {
        $float = new StringableTraitClass(2.3);
        $this->assertEquals('2.3', "{$float}");
        $float = new StringableTraitClass(-1.5);
        $this->assertEquals('-1.5', "{$float}");
    }
}
