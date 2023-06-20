<?php

declare(strict_types=1);

namespace Phrity\O\Test\Object;

use PHPUnit\Framework\TestCase;

/**
 * Phrity\O\Object\PropertyAccessTrait tests.
 */
class PropertyAccessTest extends TestCase
{
    public function setUp(): void
    {
        error_reporting(-1);
    }

    public function testPropertyAccess(): void
    {
        $object = new ImplClass((object)[]);
        $this->assertFalse(isset($object->aaa));
        unset($object->aaa); // Should not cause error when unset
        $object->aaa = 'a property value';
        $this->assertTrue(isset($object->aaa));
        $this->assertEquals('a property value', $object->aaa);
        unset($object->aaa);
        $this->assertFalse(isset($object->aaa));
    }

    public function testUndefinedProperty(): void
    {
        $object = new ImplClass((object)[]);
        $this->expectException('DomainException');
        $this->expectExceptionMessage("Undefined object property 'undefined'.");
        $object->undefined;
    }

    public function testUndefinedPropertySupressError(): void
    {
        $object = new ImplClass((object)[], false, true);
        $this->assertNull($object->undefined);
    }
}
