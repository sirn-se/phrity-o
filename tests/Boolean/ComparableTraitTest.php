<?php

/**
 * File for O\Boolean\ComparableTrait tests.
 * @package Phrity > O
 */

declare(strict_types=1);

namespace Phrity\O\Test\Boolean;

use Phrity\O\Test\Boolean\ComparableTraitClass;
use PHPUnit\Framework\TestCase;

/**
 * O\Boolean\ComparableTrait tests.
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
     * Test Boolean compare
     */
    public function testBooleanCompare(): void
    {
        $bool_1 = new ComparableTraitClass(false);
        $bool_2 = new ComparableTraitClass(false);
        $bool_3 = new ComparableTraitClass(true);

        $this->assertEquals(0, $bool_1->compare($bool_2));
        $this->assertEquals(-1, $bool_1->compare($bool_3));
        $this->assertEquals(1, $bool_3->compare($bool_2));
    }

    /**
     * Test compare wrapper methods
     */
    public function testComparisonMethods(): void
    {
        $bool_1 = new ComparableTraitClass(false);
        $bool_2 = new ComparableTraitClass(false);
        $bool_3 = new ComparableTraitClass(true);

        $this->assertTrue($bool_1->equals($bool_2));
        $this->assertFalse($bool_1->equals($bool_3));

        $this->assertFalse($bool_1->greaterThan($bool_2));
        $this->assertFalse($bool_1->greaterThan($bool_3));

        $this->assertTrue($bool_1->greaterThanOrEqual($bool_2));
        $this->assertFalse($bool_1->greaterThanOrEqual($bool_3));

        $this->assertFalse($bool_1->lessThan($bool_2));
        $this->assertTrue($bool_1->lessThan($bool_3));

        $this->assertTrue($bool_1->lessThanOrEqual($bool_2));
        $this->assertTrue($bool_1->lessThanOrEqual($bool_3));
    }

    /**
     * Test failed comparison
     */
    public function testArrIncomparable(): void
    {
        $bool = new ComparableTraitClass(false);
        $this->expectException('Phrity\Comparison\IncomparableException');
        $this->expectExceptionMessage('Can only compare Phrity\O\Test\Boolean\ComparableTraitClass');
        $bool->compare('Not comparable');
    }
}
