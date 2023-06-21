<?php

declare(strict_types=1);

namespace Phrity\O;

use PHPUnit\Framework\TestCase;
use Phrity\O\Arr;
use stdClass;

/**
 * Phrity\O\Arr tests.
 */
class ArrTest extends TestCase
{
    public function setUp(): void
    {
        error_reporting(-1);
    }

    public function testClass(): void
    {
        $arr = new Arr();
        $this->assertInstanceOf('ArrayAccess', $arr);
        $this->assertInstanceOf('Countable', $arr);
        $this->assertInstanceOf('Iterator', $arr);
        $this->assertInstanceOf('JsonSerializable', $arr);
        $this->assertInstanceOf('Phrity\Comparison\Comparable', $arr);
        $this->assertInstanceOf('Phrity\Comparison\Equalable', $arr);
        $this->assertInstanceOf('Phrity\O\SourceInterface', $arr);
        $this->assertInstanceOf('Stringable', $arr);
        $this->assertInstanceOf('Traversable', $arr);
        $this->assertIsCallable([$arr, 'compare'], 'ComparableTrait->compare not callable');
        $this->assertIsCallable([$arr, '__toString'], 'StringableTrait->__toString not callable');
    }

    public function testConstructor(): void
    {
        $arr_1 = new Arr();
        $this->assertFalse(isset($arr_1[0]));

        $arr_2 = new Arr(['a' => 1, 'b' => 2]);
        $this->assertEquals(2, $arr_2['b']);

        $arr_3 = new Arr($arr_2);
        $this->assertEquals(2, $arr_3['b']);

        $arr_4 = new Arr(new stdClass());
        $this->assertFalse(isset($arr_4[0]));

        $arr_5 = new Arr(null);
        $this->assertFalse(isset($arr_5[0]));
    }

    public function testConstructorArgumentType(): void
    {
        $this->expectException('TypeError');
        $this->expectExceptionMessage('Input must be usable as type array.');
        $arr = new Arr('unsupported');
    }

    public function testConstructorArgumentCount(): void
    {
        $this->expectException('ArgumentCountError');
        $this->expectExceptionMessage('Unsupported argument for Phrity\O\Arr.');
        $arr = new Arr(['a' => 1, 'b' => 2], 'unsupported');
    }
}
