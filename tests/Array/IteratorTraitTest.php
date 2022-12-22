<?php

/**
 * File for O\Array\IteratorTrait tests.
 * @package Phrity > O
 */

declare(strict_types=1);

namespace Phrity\O\Test\Array;

use Phrity\O\Test\Array\IteratorTraitClass;
use PHPUnit\Framework\TestCase;

/**
 * O\Array\IteratorTrait tests.
 */
class IteratorTraitTest extends TestCase
{
    /**
     * Set up for all tests
     */
    public function setUp(): void
    {
        error_reporting(-1);
    }

    /**
     * Test implementation of Iterator interface
     */
    public function testIteratorImplementation(): void
    {
        $array = new IteratorTraitClass([1, 2, 3]);

        $this->assertEquals(1, $array->current());
        $this->assertEquals(0, $array->key());
        $this->assertTrue($array->valid());
        $array->next();
        $this->assertEquals(1, $array->key());
        $array->rewind();
        $this->assertEquals(0, $array->key());
    }

    /**
     * Test magic access of Iterator interface
     */
    public function testIteratorMagic(): void
    {
        $array = new IteratorTraitClass([1, 2, 3]);

        foreach ($array as $key => $value) {
            $this->assertEquals($key + 1, $value);
        }
    }

    /**
     * Test additional iterators
     */
    public function testAdditionalIterators(): void
    {
        $array = new IteratorTraitClass([1, 2, 3]);

        $this->assertFalse($array->previous());
        $this->assertEquals(3, $array->forward());
        $this->assertEquals(2, $array->previous());
    }
}
