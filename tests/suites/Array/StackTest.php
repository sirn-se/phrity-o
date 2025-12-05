<?php

declare(strict_types=1);

namespace Phrity\O\Test\Array;

use PHPUnit\Framework\TestCase;

/**
 * Phrity\O\Array\StackTrait tests.
 */
class StackTest extends TestCase
{
    public function setUp(): void
    {
        error_reporting(-1);
    }

    public function testStack(): void
    {
        $stack = new ImplClass([]);
        $stack->push('A');
        $stack->push('B');
        $stack->push('C');
        $this->assertEquals('C', $stack->pop());
        $this->assertEquals('B', $stack->pop());
        $this->assertEquals('A', $stack->pop());
        $this->assertNull($stack->pop());
    }
}
