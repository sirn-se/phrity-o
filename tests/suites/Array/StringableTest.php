<?php

declare(strict_types=1);

namespace Phrity\O\Test\Array;

use PHPUnit\Framework\TestCase;

/**
 * Phrity\O\Array\StringableTrait tests.
 */
class StringableTest extends TestCase
{
    public function setUp(): void
    {
        error_reporting(-1);
    }

    public function testToString(): void
    {
        $array = new ImplClass([1, 2, null, []]);
        $this->assertEquals('ImplClass(4)', "{$array}");
    }
}
