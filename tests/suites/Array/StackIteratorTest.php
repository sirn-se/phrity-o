<?php

declare(strict_types=1);

namespace Phrity\O\Test\Array;

use Generator;
use PHPUnit\Framework\TestCase;

/**
 * Phrity\O\Array\StackIteratorTrait tests.
 */
class StackIteratorTest extends TestCase
{
    public function setUp(): void
    {
        error_reporting(-1);
    }

    public function testAggregate(): void
    {
        $array = new ImplStackClass([1, 2, 3]);
        $this->assertInstanceOf(Generator::class, $array->getIterator());
    }

    public function testNumericIteratorAggregate(): void
    {
        $queue = new ImplStackClass([1, 2, 3]);
        $i = 2;
        foreach ($queue as $key => $value) {
            $this->assertEquals($i, $key);
            $this->assertEquals($i + 1, $value);
            $i--;
        }
        foreach ($queue as $key => $value) {
            $this->fail('Stack should have been consumed.');
        }
    }

    public function testAssocIteratorAggregate(): void
    {
        $queue = new ImplStackClass(['a' => 1, 'b' => 2, 'c' => 3]);
        $i = 2;
        foreach ($queue as $key => $value) {
            /** @var int<0, 2> $i */
            $this->assertEquals(chr($i + 97), $key);
            $this->assertEquals($i + 1, $value);
            $i--;
        }
        foreach ($queue as $key => $value) {
            $this->fail('Stack should have been consumed.');
        }
    }
}
