<?php

declare(strict_types=1);

namespace Phrity\O\Test\Array;

use Generator;
use PHPUnit\Framework\TestCase;

/**
 * Phrity\O\Array\IteratorAggregateTrait tests.
 */
class IteratorAggregateTest extends TestCase
{
    public function setUp(): void
    {
        error_reporting(-1);
    }

    public function testAggregate(): void
    {
        $array = new ImplAggregateClass([1, 2, 3]);
        $this->assertInstanceOf(Generator::class, $array->getIterator());
    }

    public function testAggregateMagic(): void
    {
        $array = new ImplAggregateClass([1, 2, 3]);

        foreach ($array as $key => $value) {
            $this->assertEquals($key + 1, $value);
        }
    }
}
