<?php

/**
 * File for generic O\Arr tests.
 * @package Phrity > O
 */

declare(strict_types=1);

namespace Phrity\O;

use Phrity\O\Arr;

/**
 * Generic O\Arr tests.
 */
class ArrTest extends \PHPUnit\Framework\TestCase
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
        $array_1 = new Arr();
        $this->assertEquals(0, $array_1->count());

        $array_2 = new Arr(['a' => 1, 'b' => 2, 'c' => 3]);
        $this->assertEquals(2, $array_2['b']);

        $array_3 = new Arr($array_2);
        $this->assertEquals(2, $array_3['b']);

        $class = new \stdclass();
        $class->c = 3;
        $array_4 = new Arr($class);
        $this->assertEquals(3, $array_3['c']);
    }

    /**
     * Test constructor w/ numeric arrays
     */
    public function testNumericConstructor(): void
    {
        $array_1 = new Arr();
        $this->assertEquals(0, $array_1->count());

        $array_2 = new Arr([1, 2, 3]);
        $this->assertEquals(2, $array_2[1]);

        $array_3 = new Arr($array_2);
        $this->assertEquals(2, $array_3[1]);
    }

    /**
     * Test constructor w/ bad input data
     */
    public function testConstructorArgumentType(): void
    {
        $this->expectException('InvalidArgumentException');
        $this->expectExceptionMessage('Unsupported input data for O\Arr');
        $array = new Arr('unsupported');
    }

    /**
     * Test constructor w/ bad argument
     */
    public function testConstructorArgumentCount(): void
    {
        $this->expectException('InvalidArgumentException');
        $this->expectExceptionMessage('Unsupported argument for O\Arr');
        $array = new Arr([1, 2, 3], 'unsupported');
    }
}
