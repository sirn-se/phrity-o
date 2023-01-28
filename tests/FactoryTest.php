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

    public function testFactoryConvert(): void
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

    public function testFactoryNoConvert(): void
    {
        $factory = new Factory();

        $class = $factory->convert($source = new Arr([1, 2, 3]));
        $this->assertSame($source, $class);

        $class = $factory->convert($source = new Boolean(true));
        $this->assertSame($source, $class);

        $class = $factory->convert($source = new Integer(123));
        $this->assertSame($source, $class);

        $class = $factory->convert($source = new Number(123.45));
        $this->assertSame($source, $class);

        $class = $factory->convert($source = new Obj((object)['a' => 1, 'b'  => 2]));
        $this->assertSame($source, $class);

        $class = $factory->convert($source = new Str('my string'));
        $this->assertSame($source, $class);
    }

    public function testFactoryRecursiveConvert(): void
    {
        $factory = new Factory();

        $class = $factory->convert([
            1,
            'my string',
            [1, 2, 3],
            (object)['a' => 1, 'b'  => 2]
        ], true);
        $this->assertInstanceOf('Phrity\O\Arr', $class);
        $this->assertInstanceOf('Phrity\O\Integer', $class[0]);
        $this->assertInstanceOf('Phrity\O\Str', $class[1]);
        $this->assertInstanceOf('Phrity\O\Arr', $class[2]);
        $this->assertInstanceOf('Phrity\O\Integer', $class[2][0]);
        $this->assertInstanceOf('Phrity\O\Obj', $class[3]);
        $this->assertInstanceOf('Phrity\O\Integer', $class[3]->a);

        $class = $factory->convert((object)[
            'a' => 1,
            'b' => 'my string',
            'c' => [1, 2, 3],
            'd' => (object)['a' => 1, 'b'  => 2]
        ], true);
        $this->assertInstanceOf('Phrity\O\Obj', $class);
        $this->assertInstanceOf('Phrity\O\Integer', $class->a);
        $this->assertInstanceOf('Phrity\O\Str', $class->b);
        $this->assertInstanceOf('Phrity\O\Arr', $class->c);
        $this->assertInstanceOf('Phrity\O\Integer', $class->c[0]);
        $this->assertInstanceOf('Phrity\O\Obj', $class->d);
        $this->assertInstanceOf('Phrity\O\Integer', $class->d->a);
    }

    public function testFactoryInvalidConvert(): void
    {
        $factory = new Factory();

        $this->expectException('RuntimeException');
        $this->expectExceptionMessage("Unsupported type 'NULL'.");
        $factory->convert(null);
    }
}
