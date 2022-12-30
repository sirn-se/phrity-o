<?php

/**
 * File for O\String\StringableTrait tests.
 * @package Phrity > O.
 */

declare(strict_types=1);

namespace Phrity\O\Test\String;

use Phrity\O\Test\String\StringableTraitClass;
use PHPUnit\Framework\TestCase;

/**
 * O\String\StringableTrait tests.
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
     * Test toString method
     */
    public function testToString(): void
    {
        $string = new StringableTraitClass('aaa');
        $this->assertEquals('aaa', "{$string}");
    }
}
