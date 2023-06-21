<?php

declare(strict_types=1);

namespace Phrity\O\Test\Object;

use Generator;
use PHPUnit\Framework\TestCase;

/**
 * Phrity\O\Object\IteratorAggregateTrait tests.
 */
class IteratorAggregateTest extends TestCase
{
    public function setUp(): void
    {
        error_reporting(-1);
    }

    public function testAggregate(): void
    {
        $object = new ImplClass((object)['a' => 1, 'b' => 2]);
        $this->assertInstanceOf(Generator::class, $object->getIterator());
    }

    public function testAggregateMagic(): void
    {
        $object = new ImplClass((object)['1' => 1, '2' => 2, '3' => 3]);

        foreach ($object as $key => $value) {
            $this->assertEquals((int)$key, $value);
        }
    }
}
