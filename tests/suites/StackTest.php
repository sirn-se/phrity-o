<?php

declare(strict_types=1);

namespace Phrity\O;

use PHPUnit\Framework\TestCase;
use Phrity\O\Stack;

/**
 * Phrity\O\Stack tests.
 */
class StackTest extends TestCase
{
    public function setUp(): void
    {
        error_reporting(-1);
    }

    public function testClass(): void
    {
        $stack = new Stack();
        $this->assertInstanceOf('Phrity\Comparison\Comparable', $stack);
        $this->assertInstanceOf('Stringable', $stack);
        $this->assertInstanceOf('IteratorAggregate', $stack);
        $this->assertInstanceOf('Traversable', $stack);
        $this->assertInstanceOf('Countable', $stack);
        /** @phpstan-ignore method.alreadyNarrowedType */
        $this->assertIsCallable([$stack, 'compare'], 'ComparableTrait->compare not callable');
        /** @phpstan-ignore method.alreadyNarrowedType */
        $this->assertIsCallable([$stack, '__toString'], 'StringableTrait->__toString not callable');
    }

    public function testConstructor(): void
    {
        $stack_1 = new Stack();
        $this->assertCount(0, $stack_1);

        $stack_2 = new Stack([1, 2, 3]);
        $this->assertCount(3, $stack_2);

        $stack_3 = new Stack(null);
        $this->assertCount(0, $stack_3);
    }

    public function testConstructorArgumentType(): void
    {
        $this->expectException('TypeError');
        $this->expectExceptionMessage('Input must be usable as type array.');
        $stack = new Stack('unsupported');
    }

    public function testConstructorArgumentCount(): void
    {
        $this->expectException('ArgumentCountError');
        $this->expectExceptionMessage('Unsupported argument for Phrity\O\Stack.');
        $stack = new Stack(['a' => 1, 'b' => 2], 'unsupported');
    }

    public function testStackOperations(): void
    {
        $stack = new Stack([1, 2, 3]);
        $this->assertCount(3, $stack);
        foreach ($stack as $key => $value) {
            $this->assertEquals(2, $key);
            $this->assertEquals(3, $value);
            break;
        }

        $this->assertCount(2, $stack);
        $this->assertEquals(2, $stack->pop());
        $this->assertCount(1, $stack);
        $stack->push(4);
        $this->assertCount(2, $stack);
        foreach ($stack as $key => $value) {
            $this->assertEquals(1, $key);
            $this->assertEquals(4, $value);
            break;
        }
        foreach ($stack as $key => $value) {
            $this->assertEquals(0, $key);
            $this->assertEquals(1, $value);
            break;
        }
        $this->assertEmpty($stack);
    }
}
