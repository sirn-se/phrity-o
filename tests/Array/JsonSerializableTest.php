<?php

declare(strict_types=1);

namespace Phrity\O\Test\Array;

use PHPUnit\Framework\TestCase;

/**
 * Phrity\O\Array\JsonSerializableTraitTest tests.
 */
class JsonSerializableTraitTest extends TestCase
{
    public function setUp(): void
    {
        error_reporting(-1);
    }

    public function testJsonSerialize(): void
    {
        $array = new ImplClass([1, 2, null, []]);
        $this->assertEquals([1, 2, null, []], $array->jsonSerialize());
    }

    public function testToJson(): void
    {
        $array = new ImplClass([1, 2, null, []]);
        $this->assertEquals('[1,2,null,[]]', json_encode($array));
    }
}
