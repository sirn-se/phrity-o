<?php

/**
 * File for O\Array\QueueTrait tests.
 * @package Phrity > O
 */

declare(strict_types=1);

namespace Phrity\O\Test\Array;

use Phrity\O\Test\Array\QueueTraitClass;
use PHPUnit\Framework\TestCase;

/**
 * O\Array\QueueTrait tests.
 */
class QueueTraitTest extends TestCase
{
    /**
     * Set up for all tests
     */
    public function setUp(): void
    {
        error_reporting(-1);
    }

    /**
     * Test queue.
     */
    public function testQueue(): void
    {
        $queue = new QueueTraitClass();
        $queue->enqueue('A');
        $queue->enqueue('B');
        $queue->enqueue('C');
        $this->assertEquals('A', $queue->dequeue());
        $this->assertEquals('B', $queue->dequeue());
        $this->assertEquals('C', $queue->dequeue());
        $this->assertNull($queue->dequeue());
    }
}
