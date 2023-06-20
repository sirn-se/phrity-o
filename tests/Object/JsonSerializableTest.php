<?php

declare(strict_types=1);

namespace Phrity\O\Test\Object;

use PHPUnit\Framework\TestCase;

/**
 * Phrity\O\Object\JsonSerializableTest tests.
 */
class JsonSerializableTest extends TestCase
{
    public function setUp(): void
    {
        error_reporting(-1);
    }

    public function testJsonSerialize(): void
    {
        $object = new ImplClass((object)['a' => 1, 'b' => 2, 'c' => 3]);
        $this->assertEquals((object)['a' => 1, 'b' => 2, 'c' => 3], $object->jsonSerialize());
    }

    public function testToJson(): void
    {
        $object = new ImplClass((object)['a' => 1, 'b' => 2, 'c' => 3]);
        $this->assertEquals('{"a":1,"b":2,"c":3}', json_encode($object));
    }
}
