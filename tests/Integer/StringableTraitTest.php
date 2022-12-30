<?php

/**
 * File for O\Integer\StringableTrait tests.
 * @package Phrity > O
 */

declare(strict_types=1);

namespace Phrity\O\Test\Integer;

use Phrity\O\Test\Integer\StringableTraitClass;
use PHPUnit\Framework\TestCase;

/**
 * O\Integer\StringableTrait tests.
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
        $int = new StringableTraitClass(23);
        $this->assertEquals('23', "{$int}");
        $int = new StringableTraitClass(-15);
        $this->assertEquals('-15', "{$int}");
    }
}
