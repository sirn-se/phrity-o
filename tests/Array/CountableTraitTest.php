<?php

/**
 * File for O\Array\CountableTrait tests.
 * @package Phrity > O
 */

declare(strict_types=1);

namespace Phrity\O\Test\Array;

use Phrity\O\Test\Array\CountableTraitClass;
use PHPUnit\Framework\TestCase;

/**
 * O\Array\CountableTrait tests.
 */
class CountableTraitTest extends TestCase
{
    /**
     * Set up for all tests
     */
    public function setUp(): void
    {
        error_reporting(-1);
    }

    /**
     * Test implementation of Countable interface
     */
    public function testCountableImplementation(): void
    {
        $array = new CountableTraitClass([1, 2, 3]);
        $this->assertEquals(3, $array->count());
    }
}
