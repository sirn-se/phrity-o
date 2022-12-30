<?php

/**
 * File for O\Object\StringableTrait tests.
 * @package Phrity > O.
 */

declare(strict_types=1);

namespace Phrity\O\Test\Object;

use Phrity\O\Test\Object\StringableTraitClass;
use PHPUnit\Framework\TestCase;

/**
 * O\Object\StringableTrait tests.
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
        $object = new StringableTraitClass((object)['a' => 1, 'b' => 2, 'c' => 3]);
        $this->assertEquals('Phrity\O\Test\Object\StringableTraitClass', "{$object}");
    }
}
