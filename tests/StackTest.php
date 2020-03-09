<?php

/**
 * File for generic O\Stack tests.
 * @package Phrity > O
 */

declare(strict_types=1);

namespace Phrity\O;

use Phrity\O\Stack;

/**
 * Generic O\Stack tests.
 */
class StackTest extends \PHPUnit\Framework\TestCase
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
        $stack_1 = new Stack();
        $this->assertEquals(0, $stack_1->count());

        $stack_2 = new Stack(['a' => 1, 'b' => 2, 'c' => 3]);
        $this->assertEquals(3, $stack_2->count());

        $stack_3 = new Stack($stack_2);
        $this->assertEquals(3, $stack_3->count());
    }

    /**
     * Test constructor w/ numeric arrays
     */
    public function testNumericConstructor(): void
    {
        $stack_1 = new Stack();
        $this->assertEquals(0, $stack_1->count());

        $stack_2 = new Stack([1, 2, 3]);
        $this->assertEquals(3, $stack_2->count());

        $stack_3 = new Stack($stack_2);
        $this->assertEquals(3, $stack_3->count());
    }

    /**
     * Test constructor w/ bad input data
     */
    public function testConstructorArgumentType(): void
    {
        $this->expectException('InvalidArgumentException');
        $this->expectExceptionMessage('Unsupported input data for O\Stack');
        $stack = new Stack('unsupported');
    }

    /**
     * Test constructor w/ bad argument
     */
    public function testConstructorArgumentCount(): void
    {
        $this->expectException('InvalidArgumentException');
        $this->expectExceptionMessage('Unsupported argument for O\Stack');
        $stack = new Stack([1, 2, 3], 'unsupported');
    }


    // Test stack operations

    /**
     * Test push/pop operations
     */
    public function testStackOperations(): void
    {
        $stack = new Stack([1, 2, 3]);
        $this->assertEquals(3, $stack->pop());
        $stack->push(4);
        $this->assertEquals(4, $stack->pop());
        $this->assertEquals(2, $stack->pop());
        $this->assertEquals(1, $stack->pop());
        $this->assertNull($stack->pop());
        $stack->push(5);
        $this->assertEquals(5, $stack->pop());
    }


    // Test Countable interface

    /**
     * Test implementation of Countable interface
     */
    public function testCountableImplementation(): void
    {
        $stack = new Stack([1, 2, 3]);
        $this->assertEquals(3, $stack->count());
    }


    // Test IteratorAggregate interface

    /**
     * Test IteratorAggregate with numeric keys
     */
    public function xxtestNumericIteratorAggregate(): void
    {
        $stack = new Stack([1, 2, 3]);
        $this->assertInstanceOf('Generator', $stack->getIterator());
        $i = 2;
        foreach ($stack as $key => $value) {
            $this->assertEquals(0, $key);
            $this->assertEquals($i + 1, $value);
            $i--;
        }
        $this->assertCount(0, $stack);
    }

    /**
     * Test IteratorAggregate with non-numeric keys
     */
    public function testAssocIteratorAggregate(): void
    {
        $stack = new Stack(['a' => 1, 'b' => 2, 'c' => 3]);
        $this->assertInstanceOf('Generator', $stack->getIterator());
        $i = 2;
        $a = ord('a');
        foreach ($stack as $key => $value) {
            $this->assertEquals(chr($a + $i), $key);
            $this->assertEquals($i + 1, $value);
            $i--;
        }
        $this->assertCount(0, $stack);
    }


    // Test representation methods

    /**
     * Test toString method
     */
    public function testToString(): void
    {
        $obj = new Stack([1, 2, null, []]);
        $this->assertEquals('Phrity\O\Stack(4)', "{$obj}");
    }
}
