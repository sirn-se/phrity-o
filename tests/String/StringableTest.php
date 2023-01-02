<?php

declare(strict_types=1);

namespace Phrity\O\Test\String;

use PHPUnit\Framework\TestCase;

/**
 * Phrity\O\String\StringableTrait tests.
 */
class StringableTraitTest extends TestCase
{
    public function setUp(): void
    {
        error_reporting(-1);
    }

    public function testToString(): void
    {
        $string = new ImplClass('aaa');
        $this->assertEquals('aaa', "{$string}");
    }
}
