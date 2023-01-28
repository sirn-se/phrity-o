<?php

declare(strict_types=1);

namespace Phrity\O\Test\Array;

use PHPUnit\Framework\TestCase;

/**
 * Phrity\O\Array\QueueTrait tests.
 */
class QueueTest extends TestCase
{
    public function setUp(): void
    {
        error_reporting(-1);
    }

    public function testQueue(): void
    {
        $queue = new ImplClass([]);
        $queue->enqueue('A');
        $queue->enqueue('B');
        $queue->enqueue('C');
        $this->assertEquals('A', $queue->dequeue());
        $this->assertEquals('B', $queue->dequeue());
        $this->assertEquals('C', $queue->dequeue());
        $this->assertNull($queue->dequeue());
    }
}
