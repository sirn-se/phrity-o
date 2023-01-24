<?php

declare(strict_types=1);

namespace Phrity\O;

use PHPUnit\Framework\TestCase;
use Phrity\O\Factory;

/**
 * Phrity\O\Factory class tests.
 */
class FactoryTest extends TestCase
{
    public function setUp(): void
    {
        error_reporting(-1);
    }

    public function testFactory(): void
    {
        $factory = new Factory();

        $class = $factory->convert([1, 2, 3]);
        $this->assertInstanceOf('Phrity\O\Arr', $class);
        $this->assertCount(3, $class);

        $class = $factory->convert(true);
        $this->assertInstanceOf('Phrity\O\Boolean', $class);
        $this->assertTrue($class());

        $class = $factory->convert(123);
        $this->assertInstanceOf('Phrity\O\Integer', $class);
        $this->assertSame(123, $class());

        $class = $factory->convert(123.45);
        $this->assertInstanceOf('Phrity\O\Number', $class);
        $this->assertSame(123.45, $class());

        $class = $factory->convert((object)['a' => 1, 'b'  => 2]);
        $this->assertInstanceOf('Phrity\O\Obj', $class);
        $this->assertSame(1, $class->a);

        $class = $factory->convert('my string');
        $this->assertInstanceOf('Phrity\O\Str', $class);
        $this->assertSame('my string', $class());
    }

    public function testFactoryInvalidConvert(): void
    {
        $factory = new Factory();

        $this->expectException('RuntimeException');
        $this->expectExceptionMessage("Unsupported type 'NULL'.");
        $factory->convert(null);
    }
}
