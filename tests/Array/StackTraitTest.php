<?php

/**
 * File for O\Array\StackTrait tests.
 * @package Phrity > O
 */

declare(strict_types=1);

namespace Phrity\O\Test\Array;

use Phrity\O\Test\Array\StackTraitClass;
use PHPUnit\Framework\TestCase;

/**
 * O\Array\StackTrait tests.
 */
class StackTraitTest extends TestCase
{
    /**
     * Set up for all tests
     */
    public function setUp(): void
    {
        error_reporting(-1);
    }

    /**
     * Test stack.
     */
    public function testStack(): void
    {
        $stack = new StackTraitClass();
        $stack->push('A');
        $stack->push('B');
        $stack->push('C');
        $this->assertEquals('C', $stack->pop());
        $this->assertEquals('B', $stack->pop());
        $this->assertEquals('A', $stack->pop());
        $this->assertNull($stack->pop());
    }
}
