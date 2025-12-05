<?php

declare(strict_types=1);

namespace Phrity\O;

use PHPUnit\Framework\TestCase;
use Phrity\O\Queue;

/**
 * Phrity\O\Queue tests.
 */
class QueueTest extends TestCase
{
    public function setUp(): void
    {
        error_reporting(-1);
    }

    public function testClass(): void
    {
        $queue = new Queue();
        $this->assertInstanceOf('Phrity\Comparison\Comparable', $queue);
        $this->assertInstanceOf('Stringable', $queue);
        $this->assertInstanceOf('IteratorAggregate', $queue);
        $this->assertInstanceOf('Traversable', $queue);
        $this->assertInstanceOf('Countable', $queue);
        /** @phpstan-ignore method.alreadyNarrowedType */
        $this->assertIsCallable([$queue, 'compare'], 'ComparableTrait->compare not callable');
        /** @phpstan-ignore method.alreadyNarrowedType */
        $this->assertIsCallable([$queue, '__toString'], 'StringableTrait->__toString not callable');
    }

    public function testConstructor(): void
    {
        $queue_1 = new Queue();
        $this->assertCount(0, $queue_1);

        $queue_2 = new Queue([1, 2, 3]);
        $this->assertCount(3, $queue_2);

        $queue_3 = new Queue(null);
        $this->assertCount(0, $queue_3);
    }

    public function testConstructorArgumentType(): void
    {
        $this->expectException('TypeError');
        $this->expectExceptionMessage('Input must be usable as type array.');
        $queue = new Queue('unsupported');
    }

    public function testConstructorArgumentCount(): void
    {
        $this->expectException('ArgumentCountError');
        $this->expectExceptionMessage('Unsupported argument for Phrity\O\Queue.');
        $queue = new Queue(['a' => 1, 'b' => 2], 'unsupported');
    }

    public function testQueueOperations(): void
    {
        $queue = new Queue([1, 2, 3]);
        $this->assertCount(3, $queue);
        foreach ($queue as $key => $value) {
            $this->assertEquals(0, $key);
            $this->assertEquals(1, $value);
            break;
        }
        $this->assertCount(2, $queue);
        $this->assertEquals(2, $queue->dequeue());
        $this->assertCount(1, $queue);
        $queue->enqueue(4);
        $this->assertCount(2, $queue);
        foreach ($queue as $key => $value) {
            $this->assertEquals(0, $key);
            $this->assertEquals(3, $value);
            break;
        }
        foreach ($queue as $key => $value) {
            $this->assertEquals(0, $key);
            $this->assertEquals(4, $value);
            break;
        }
        $this->assertEmpty($queue);
    }
}
