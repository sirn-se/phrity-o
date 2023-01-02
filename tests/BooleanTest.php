<?php

declare(strict_types=1);

namespace Phrity\O;

use PHPUnit\Framework\TestCase;
use Phrity\O\Boolean;

/**
 * Phrity\O\Boolean class tests.
 */
class BooleanTest extends TestCase
{
    public function setUp(): void
    {
        error_reporting(-1);
    }

    public function testClass(): void
    {
        $bool = new Boolean(false);
        $this->assertInstanceOf('Phrity\Comparison\Comparable', $bool);
        $this->assertInstanceOf('Stringable', $bool);
        $this->assertIsCallable([$bool, 'compare'], 'ComparableTrait->compare not callable');
        $this->assertIsCallable([$bool, '__invoke'], 'InvokableTrait->__invoke not callable');
        $this->assertIsCallable([$bool, '__toString'], 'StringableTrait->__toString not callable');
    }

    public function testConstructor(): void
    {
        $bool = new Boolean(false);
        $this->assertSame(false, $bool());
        $bool = new Boolean(null);
        $this->assertSame(false, $bool());
        $bool = new Boolean('123');
        $this->assertSame(true, $bool());
        $bool = new Boolean(new Boolean(true));
        $this->assertSame(true, $bool());
    }

    public function testConstructorArgumentType(): void
    {
        $this->expectException('TypeError');
        $this->expectExceptionMessage('Input must be usable as type bool.');
        $bool = new Boolean('not a number');
    }

    public function testConstructorArgumentCount(): void
    {
        $this->expectException('ArgumentCountError');
        $this->expectExceptionMessage('Unsupported argument for Phrity\O\Boolean.');
        $bool = new Boolean(false, 'unsupported');
    }
}
