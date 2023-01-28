<?php

declare(strict_types=1);

namespace Phrity\O\Test\Array;

use Generator;
use PHPUnit\Framework\TestCase;

/**
 * Phrity\O\Array\QueueIteratorTrait tests.
 */
class QueueIteratorTest extends TestCase
{
    public function setUp(): void
    {
        error_reporting(-1);
    }

    public function testAggregate(): void
    {
        $array = new ImplQueueClass([1, 2, 3]);
        $this->assertInstanceOf(Generator::class, $array->getIterator());
    }

    public function testNumericIteratorAggregate(): void
    {
        $queue = new ImplQueueClass([1, 2, 3]);
        $i = 0;
        foreach ($queue as $key => $value) {
            $this->assertEquals(0, $key);
            $this->assertEquals($i + 1, $value);
            $i++;
        }
        foreach ($queue as $key => $value) {
            $this->fail('Queue should have been consumed.');
        }
    }

    public function testAssocIteratorAggregate(): void
    {
        $queue = new ImplQueueClass(['a' => 1, 'b' => 2, 'c' => 3]);
        $i = 0;
        $a = ord('a');
        foreach ($queue as $key => $value) {
            $this->assertEquals(chr($a + $i), $key);
            $this->assertEquals($i + 1, $value);
            $i++;
        }
        foreach ($queue as $key => $value) {
            $this->fail('Queue should have been consumed.');
        }
    }
}
