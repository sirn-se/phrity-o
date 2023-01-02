<?php

declare(strict_types=1);

namespace Phrity\O\Test\Boolean;

use PHPUnit\Framework\TestCase;

/**
 * Phrity\O\Boolean\StringableTrait tests.
 */
class StringableTraitTest extends TestCase
{
    public function setUp(): void
    {
        error_reporting(-1);
    }

    public function testToString(): void
    {
        $bool = new ImplClass(false);
        $this->assertEquals('false', "{$bool}");
        $bool = new ImplClass(true);
        $this->assertEquals('true', "{$bool}");
    }
}
