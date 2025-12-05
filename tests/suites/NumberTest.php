<?php

declare(strict_types=1);

namespace Phrity\O;

use PHPUnit\Framework\TestCase;
use Phrity\O\Number;

/**
 * Phrity\O\Number class tests.
 */
class NumberTest extends TestCase
{
    public function setUp(): void
    {
        error_reporting(-1);
    }

    public function testClass(): void
    {
        $int = new Number();
        $this->assertInstanceOf('Phrity\Comparison\Comparable', $int);
        $this->assertInstanceOf('Stringable', $int);
        /** @phpstan-ignore method.alreadyNarrowedType */
        $this->assertIsCallable([$int, 'compare'], 'ComparableTrait->compare not callable');
        /** @phpstan-ignore method.alreadyNarrowedType */
        $this->assertIsCallable([$int, '__invoke'], 'InvokableTrait->__invoke not callable');
        /** @phpstan-ignore method.alreadyNarrowedType */
        $this->assertIsCallable([$int, '__toString'], 'StringableTrait->__toString not callable');
    }

    public function testConstructor(): void
    {
        $float = new Number();
        $this->assertSame(0.0, $float());
        $float = new Number(null);
        $this->assertSame(0.0, $float());
        $float = new Number('123.45');
        $this->assertSame(123.45, $float());
        $float = new Number(123);
        $this->assertSame(123.0, $float());
        $float = new Number(new Number(123.45));
        $this->assertSame(123.45, $float());
    }

    public function testConstructorArgumentType(): void
    {
        $this->expectException('TypeError');
        $this->expectExceptionMessage('Input must be usable as type float.');
        $float = new Number('not a number');
    }

    public function testConstructorArgumentCount(): void
    {
        $this->expectException('ArgumentCountError');
        $this->expectExceptionMessage('Unsupported argument for Phrity\O\Number.');
        $float = new Number(123.45, 'unsupported');
    }
}
