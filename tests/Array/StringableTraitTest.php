<?php

/**
 * File for O\Array\StringableTrait tests.
 * @package Phrity > O
 */

declare(strict_types=1);

namespace Phrity\O\Test\Array;

use Phrity\O\Test\Array\StringableTraitClass;
use PHPUnit\Framework\TestCase;

/**
 * O\Array\StringableTrait tests.
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
        $obj = new StringableTraitClass([1, 2, null, []]);
        $this->assertEquals('StringableTraitClass(4)', "{$obj}");
    }
}
