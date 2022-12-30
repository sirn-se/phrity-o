<?php

/**
 * File for O\Object\PropertyAccessTrait tests.
 * @package Phrity > O.
 */

declare(strict_types=1);

namespace Phrity\O\Test\Object;

use Phrity\O\Test\Object\PropertyAccessTraitClass;
use PHPUnit\Framework\TestCase;

/**
 * O\Object\PropertyAccessTrait tests.
 */
class PropertyAccessTraitTest extends TestCase
{
    /**
     * Set up for all tests.
     */
    public function setUp(): void
    {
        error_reporting(-1);
    }

    /**
     * Test property access.
     */
    public function testPropertyAccess(): void
    {
        $object = new PropertyAccessTraitClass((object)[]);
        $this->assertFalse(isset($object->aaa));
        unset($object->aaa); // Should not cause error when unset
        $object->aaa = 'a property value';
        $this->assertTrue(isset($object->aaa));
        $this->assertEquals('a property value', $object->aaa);
        unset($object->aaa);
        $this->assertFalse(isset($object->aaa));
    }

    /**
     * Test get on undefined property; throws Error
     */
    public function testUndefinedProperty(): void
    {
        $object = new PropertyAccessTraitClass((object)[]);
        $this->expectError('PHPUnit\Framework\Error\Error');
        $this->expectErrorMessage('Undefined object property undefined');
        $object->undefined;
    }
}
