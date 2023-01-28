<?php

declare(strict_types=1);

namespace Phrity\O\Test\Integer;

use PHPUnit\Framework\TestCase;

/**
 * Phrity\O\Integer\StringableTrait tests.
 */
class StringableTest extends TestCase
{
    public function setUp(): void
    {
        error_reporting(-1);
    }

    public function testToString(): void
    {
        $int = new ImplClass(23);
        $this->assertEquals('23', "{$int}");
        $int = new ImplClass(-15);
        $this->assertEquals('-15', "{$int}");
        $int = new ImplClass(0);
        $this->assertEquals('0', "{$int}");
    }
}
