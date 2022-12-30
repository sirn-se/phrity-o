<?php

/**
 * File for O\Integer\ComparableTrait tests.
 * @package Phrity > O
 */

declare(strict_types=1);

namespace Phrity\O\Test\Integer;

use Phrity\O\Test\Integer\ComparableTraitClass;
use PHPUnit\Framework\TestCase;

/**
 * O\Integer\ComparableTrait tests.
 */
class ComparableTraitTest extends TestCase
{
    /**
     * Set up for all tests
     */
    public function setUp(): void
    {
        error_reporting(-1);
    }

    /**
     * Test Integer compare
     */
    public function testIntegerCompare(): void
    {
        $int_1 = new ComparableTraitClass(56);
        $int_2 = new ComparableTraitClass(56);
        $int_3 = new ComparableTraitClass(78);

        $this->assertEquals(0, $int_1->compare($int_2));
        $this->assertEquals(-1, $int_1->compare($int_3));
        $this->assertEquals(1, $int_3->compare($int_2));
    }

    /**
     * Test compare wrapper methods
     */
    public function testIntegerMethods(): void
    {
        $int_1 = new ComparableTraitClass(56);
        $int_2 = new ComparableTraitClass(56);
        $int_3 = new ComparableTraitClass(78);

        $this->assertTrue($int_1->equals($int_2));
        $this->assertFalse($int_1->equals($int_3));

        $this->assertFalse($int_1->greaterThan($int_2));
        $this->assertFalse($int_1->greaterThan($int_3));

        $this->assertTrue($int_1->greaterThanOrEqual($int_2));
        $this->assertFalse($int_1->greaterThanOrEqual($int_3));

        $this->assertFalse($int_1->lessThan($int_2));
        $this->assertTrue($int_1->lessThan($int_3));

        $this->assertTrue($int_1->lessThanOrEqual($int_2));
        $this->assertTrue($int_1->lessThanOrEqual($int_3));
    }

    /**
     * Test failed comparison
     */
    public function testIntegerIncomparable(): void
    {
        $bool = new ComparableTraitClass(26);
        $this->expectException('Phrity\Comparison\IncomparableException');
        $this->expectExceptionMessage('Can only compare Phrity\O\Test\Integer\ComparableTraitClass');
        $bool->compare('Not comparable');
    }
}
