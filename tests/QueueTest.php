<?php

/**
 * File for generic O\Queue tests.
 * @package Phrity > O
 */

declare(strict_types=1);

namespace Phrity\O;

use Phrity\O\Queue;

/**
 * Generic O\Queue tests.
 */
class QueueTest extends \PHPUnit\Framework\TestCase
{

    /**
     * Set up for all tests
     */
    public function setUp(): void
    {
        error_reporting(-1);
    }


    // Test constructor

    /**
     * Test constructor w/ associative arrays
     */
    public function testAssociativeConstructor(): void
    {
        $queue_1 = new Queue();
        $this->assertEquals(0, $queue_1->count());

        $queue_2 = new Queue(['a' => 1, 'b' => 2, 'c' => 3]);
        $this->assertEquals(3, $queue_2->count());

        $queue_3 = new Queue($queue_2);
        $this->assertEquals(3, $queue_3->count());
    }

    /**
     * Test constructor w/ numeric arrays
     */
    public function testNumericConstructor(): void
    {
        $queue_1 = new Queue();
        $this->assertEquals(0, $queue_1->count());

        $queue_2 = new Queue([1, 2, 3]);
        $this->assertEquals(3, $queue_2->count());

        $queue_3 = new Queue($queue_2);
        $this->assertEquals(3, $queue_3->count());
    }

    /**
     * Test constructor w/ bad input data
     */
    public function testConstructorArgumentType(): void
    {
        $this->expectException('InvalidArgumentException');
        $this->expectExceptionMessage('Unsupported input data for O\Queue');
        $queue = new Queue('unsupported');
    }

    /**
     * Test constructor w/ bad argument
     */
    public function testConstructorArgumentCount(): void
    {
        $this->expectException('InvalidArgumentException');
        $this->expectExceptionMessage('Unsupported argument for O\Queue');
        $queue = new Queue([1, 2, 3], 'unsupported');
    }


    // Test queue operations

    /**
     * Test enqueue/dequeue operations
     */
    public function testQueueOperations(): void
    {
        $queue = new Queue([1, 2, 3]);
        $this->assertEquals(1, $queue->dequeue());
        $queue->enqueue(4);
        $this->assertEquals(2, $queue->dequeue());
        $this->assertEquals(3, $queue->dequeue());
        $this->assertEquals(4, $queue->dequeue());
        $this->assertNull($queue->dequeue());
        $queue->enqueue(5);
        $this->assertEquals(5, $queue->dequeue());
    }


    // Test Countable interface

    /**
     * Test implementation of Countable interface
     */
    public function testCountableImplementation(): void
    {
        $queue = new Queue([1, 2, 3]);
        $this->assertEquals(3, $queue->count());
    }


    // Test IteratorAggregate interface

    /**
     * Test IteratorAggregate with numeric keys
     */
    public function testNumericIteratorAggregate(): void
    {
        $queue = new Queue([1, 2, 3]);
        $this->assertInstanceOf('Generator', $queue->getIterator());
        $i = 0;
        foreach ($queue as $key => $value) {
            $this->assertEquals(0, $key);
            $this->assertEquals($i + 1, $value);
            $i++;
        }
        $this->assertCount(0, $queue);
    }

    /**
     * Test IteratorAggregate with non-numeric keys
     */
    public function testAssocIteratorAggregate(): void
    {
        $queue = new Queue(['a' => 1, 'b' => 2, 'c' => 3]);
        $this->assertInstanceOf('Generator', $queue->getIterator());
        $i = 0;
        $a = ord('a');
        foreach ($queue as $key => $value) {
            $this->assertEquals(chr($a + $i), $key);
            $this->assertEquals($i + 1, $value);
            $i++;
        }
        $this->assertCount(0, $queue);
    }

    // Test representation methods

    /**
     * Test toString method
     */
    public function testToString(): void
    {
        $obj = new Queue([1, 2, null, []]);
        $this->assertEquals('Phrity\O\Queue(4)', "{$obj}");
    }
}
