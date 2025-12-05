<?php

declare(strict_types=1);

namespace Phrity\O\Test\Object;

use PHPUnit\Framework\TestCase;

/**
 * Phrity\O\Object\StringableTrait tests.
 */
class StringableTest extends TestCase
{
    public function setUp(): void
    {
        error_reporting(-1);
    }

    public function testToString(): void
    {
        $object = new ImplClass((object)['a' => 1, 'b' => 2, 'c' => 3]);
        $this->assertEquals('Phrity\O\Test\Object\ImplClass', "{$object}");
    }
}
