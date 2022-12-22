<?php

/**
 * File for O\Array\StackIteratorTrait tests.
 * @package Phrity > O
 */

declare(strict_types=1);

namespace Phrity\O\Test\Array;

use Generator;
use Phrity\O\Test\Array\StackIteratorTraitClass;
use PHPUnit\Framework\TestCase;

/**
 * O\Array\StackIteratorTrait tests.
 */
class StackIteratorTraitTest extends TestCase
{
    /**
     * Set up for all tests
     */
    public function setUp(): void
    {
        error_reporting(-1);
    }

    /**
     * Test implementation of IteratorAggregate interface
     */
    public function testAggregate(): void
    {
        $array = new StackIteratorTraitClass([1, 2, 3]);
        $this->assertInstanceOf(Generator::class, $array->getIterator());
    }

    /**
     * Test iterator with numeric keys
     */
    public function testNumericIteratorAggregate(): void
    {
        $queue = new StackIteratorTraitClass([1, 2, 3]);
        $i = 0;
        foreach ($queue as $key => $value) {
            $this->assertEquals(0, $key);
            $this->assertEquals($i + 1, $value);
            $i++;
        }
        foreach ($queue as $key => $value) {
            $this->fail('Stack should have been consumed.');
        }
    }

    /**
     * Test iterator with non-numeric keys
     */
    public function testAssocIteratorAggregate(): void
    {
        $queue = new StackIteratorTraitClass(['a' => 1, 'b' => 2, 'c' => 3]);
        $i = 0;
        $a = ord('a');
        foreach ($queue as $key => $value) {
            $this->assertEquals(chr($a + $i), $key);
            $this->assertEquals($i + 1, $value);
            $i++;
        }
        foreach ($queue as $key => $value) {
            $this->fail('Stack should have been consumed.');
        }
    }
}
