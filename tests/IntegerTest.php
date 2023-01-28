<?php

declare(strict_types=1);

namespace Phrity\O\Test;

use PHPUnit\Framework\TestCase;
use Phrity\O\Integer;

/**
 * Phrity\O\Integer class tests.
 */
class IntegerTest extends TestCase
{
    public function setUp(): void
    {
        error_reporting(-1);
    }

    public function testClass(): void
    {
        $int = new Integer();
        $this->assertInstanceOf('Phrity\Comparison\Comparable', $int);
        $this->assertInstanceOf('Stringable', $int);
        $this->assertIsCallable([$int, 'compare'], 'ComparableTrait->compare not callable');
        $this->assertIsCallable([$int, '__invoke'], 'InvokableTrait->__invoke not callable');
        $this->assertIsCallable([$int, '__toString'], 'StringableTrait->__toString not callable');
    }

    public function testConstructor(): void
    {
        $int = new Integer();
        $this->assertSame(0, $int());
        $int = new Integer(null);
        $this->assertSame(0, $int());
        $int = new Integer('123');
        $this->assertSame(123, $int());
        $int = new Integer(123.00);
        $this->assertSame(123, $int());
        $int = new Integer(new Integer(123.00));
        $this->assertSame(123, $int());
    }

    public function testConstructorArgumentType(): void
    {
        $this->expectException('TypeError');
        $this->expectExceptionMessage('Input must be usable as type int.');
        $int = new Integer('not a number');
    }

    public function testFloatException(): void
    {
        $this->expectException('TypeError');
        $this->expectExceptionMessage('Input must be usable as type int.');
        $int = new Integer(12.34);
    }

    public function testConstructorArgumentCount(): void
    {
        $this->expectException('ArgumentCountError');
        $this->expectExceptionMessage('Unsupported argument for Phrity\O\Integer.');
        $int = new Integer(56, 'unsupported');
    }
}
