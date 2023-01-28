<?php

declare(strict_types=1);

namespace Phrity\O\Test\Array;

use PHPUnit\Framework\TestCase;

/**
 * Phrity\O\Array\IteratorTrait tests.
 */
class IteratorTest extends TestCase
{
    public function setUp(): void
    {
        error_reporting(-1);
    }

    public function testIteratorImplementation(): void
    {
        $array = new ImplClass([1, 2, 3]);

        $this->assertEquals(1, $array->current());
        $this->assertEquals(0, $array->key());
        $this->assertTrue($array->valid());
        $array->next();
        $this->assertEquals(1, $array->key());
        $array->rewind();
        $this->assertEquals(0, $array->key());
    }

    public function testIteratorMagic(): void
    {
        $array = new ImplClass([1, 2, 3]);

        foreach ($array as $key => $value) {
            $this->assertEquals($key + 1, $value);
        }
    }

    public function testAdditionalIterators(): void
    {
        $array = new ImplClass([1, 2, 3]);

        $this->assertFalse($array->previous());
        $this->assertEquals(3, $array->forward());
        $this->assertEquals(2, $array->previous());
    }
}
