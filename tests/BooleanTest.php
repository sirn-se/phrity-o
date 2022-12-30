<?php

/**
 * File for generic O\Boolean tests.
 * @package Phrity > O
 */

declare(strict_types=1);

namespace Phrity\O;

use PHPUnit\Framework\TestCase;
use Phrity\O\Boolean;
use stdClass;

/**
 * Generic O\Boolean tests.
 */
class BooleanTest extends TestCase
{
    /**
     * Set up for all tests
     */
    public function setUp(): void
    {
        error_reporting(-1);
    }

    /**
     * Test false input
     */
    public function testFalseInput(): void
    {
        $bool = new Boolean(false);
        $this->assertSame(false, $bool());
        $this->assertSame(false, $bool(false));
        $this->assertSame('false', "{$bool}");
    }

    /**
     * Test true input
     */
    public function testTrueInput(): void
    {
        $bool = new Boolean(true);
        $this->assertSame(true, $bool());
        $this->assertSame(true, $bool(true));
        $this->assertSame('true', "{$bool}");
    }

    /**
     * Test constructor w/ bad input data
     */
    public function testConstructorArgumentType(): void
    {
        $this->expectException('InvalidArgumentException');
        $this->expectExceptionMessage('Unsupported input data for O\Boolean');
        $bool = new Boolean(new stdClass());
    }

    /**
     * Test constructor w/ bad argument
     */
    public function testConstructorArgumentCount(): void
    {
        $this->expectException('InvalidArgumentException');
        $this->expectExceptionMessage('Unsupported argument for O\Boolean');
        $bool = new Boolean(true, 'unsupported');
    }

    /**
     * Test setter w/ bad input data
     */
    public function testSetterException(): void
    {
        $bool = new Boolean();
        $this->expectException('TypeError');
        $this->expectExceptionMessage('Phrity\O\Boolean::__invoke()');
        $bool(new stdClass());
    }
}
