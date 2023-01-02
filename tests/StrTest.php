<?php

declare(strict_types=1);

namespace Phrity\O;

use PHPUnit\Framework\TestCase;
use Phrity\O\Str;

/**
 * Phrity\O\Str class tests.
 */
class StrTest extends TestCase
{

    public function setUp(): void
    {
        error_reporting(-1);
    }

    public function testClass(): void
    {
        $str = new Str();
        $this->assertInstanceOf('Phrity\Comparison\Comparable', $str);
        $this->assertInstanceOf('Stringable', $str);
        $this->assertIsCallable([$str, 'compare'], 'ComparableTrait->compare not callable');
        $this->assertIsCallable([$str, '__invoke'], 'InvokableTrait->__invoke not callable');
        $this->assertIsCallable([$str, '__toString'], 'StringableTrait->__toString not callable');
    }

    public function testConstructor(): void
    {
        $str = new Str();
        $this->assertSame('', $str());
        $str = new Str('a test');
        $this->assertSame('a test', $str());
        $str = new Str(null);
        $this->assertSame('', $str());
        $str = new Str('123');
        $this->assertSame('123', $str());
        $str = new Str(false);
        $this->assertSame('', $str());
        $str = new Str(true);
        $this->assertSame('1', $str());
        $str = new Str(new Str('a test'));
        $this->assertSame('a test', $str());
    }

    public function testConstructorArgumentType(): void
    {
        $this->expectException('TypeError');
        $this->expectExceptionMessage('Input must be usable as type string.');
        $str = new Str([]);
    }

    public function testConstructorArgumentCount(): void
    {
        $this->expectException('ArgumentCountError');
        $this->expectExceptionMessage('Unsupported argument for Phrity\O\Str.');
        $str = new Str('a test', 'unsupported');
    }
}
