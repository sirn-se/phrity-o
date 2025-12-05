<?php

declare(strict_types=1);

namespace Phrity\O\Test\Array;

use PHPUnit\Framework\TestCase;

/**
 * Phrity\O\Array\CountableTrait tests.
 */
class CountableTest extends TestCase
{
    public function setUp(): void
    {
        error_reporting(-1);
    }

    public function testCountableImplementation(): void
    {
        $array = new ImplClass([1, 2, 3]);
        $this->assertEquals(3, $array->count());
    }
}
