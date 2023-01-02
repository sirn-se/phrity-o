<?php

declare(strict_types=1);

namespace Phrity\O\Test\Object;

use PHPUnit\Framework\TestCase;

/**
 * Phrity\O\Object\PropertyAccessTrait tests.
 */
class PropertyAccessTraitTest extends TestCase
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
        $this->expectError('PHPUnit\Framework\Error\Error');
        $this->expectErrorMessage('Undefined object property undefined');
        $object->undefined;
    }
}
