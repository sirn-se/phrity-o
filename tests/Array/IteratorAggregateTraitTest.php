<?php

/**
 * File for O\Array\IteratorAggregateTrait tests.
 * @package Phrity > O
 */

declare(strict_types=1);

namespace Phrity\O\Test\Array;

use Generator;
use Phrity\O\Test\Array\IteratorAggregateTraitClass;
use PHPUnit\Framework\TestCase;

/**
 * O\Array\IteratorAggregateTrait tests.
 */
class IteratorAggregateTraitTest extends TestCase
{
    /**
     * Set up for all tests
     */
    public function setUp(): void
    {
        error_reporting(-1);
    }

    /**
     * Test implementation of IteratorAggregate interface
     */
    public function testAggregate(): void
    {
        $array = new IteratorAggregateTraitClass([1, 2, 3]);
        $this->assertInstanceOf(Generator::class, $array->getIterator());
    }

    /**
     * Test magic access of IteratorAggregate interface
     */
    public function testAggregateMagic(): void
    {
        $array = new IteratorAggregateTraitClass([1, 2, 3]);

        foreach ($array as $key => $value) {
            $this->assertEquals($key + 1, $value);
        }
    }
}
