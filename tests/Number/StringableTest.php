<?php

declare(strict_types=1);

namespace Phrity\O\Test\Number;

use PHPUnit\Framework\TestCase;

/**
 * Phrity\O\Number\StringableTrait tests.
 */
class StringableTraitTest extends TestCase
{
    public function setUp(): void
    {
        error_reporting(-1);
    }

    public function testToString(): void
    {
        $float = new ImplClass(2.3);
        $this->assertEquals('2.3', "{$float}");
        $float = new ImplClass(-1.5);
        $this->assertEquals('-1.5', "{$float}");
    }
}
