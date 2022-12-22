<?php

/**
 * File for O\Array\ComparableTrait tests.
 * @package Phrity > O
 */

declare(strict_types=1);

namespace Phrity\O\Test\Array;

use Phrity\O\Test\Array\ComparableTraitClass;
use PHPUnit\Framework\TestCase;

/**
 * O\Array\ComparableTrait tests.
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
     * Test compare
     */
    public function testArrCompare(): void
    {
        $arr_1 = new ComparableTraitClass([1, 2, 3]);
        $arr_2 = new ComparableTraitClass([1, 2, 3]);
        $arr_3 = new ComparableTraitClass([1, 2, 3, 4]);

        $this->assertEquals(0, $arr_1->compare($arr_2));
        $this->assertEquals(-1, $arr_1->compare($arr_3));
        $this->assertEquals(1, $arr_3->compare($arr_2));
    }

    /**
     * Test compare wrapper methods
     */
    public function testComparisonMethods(): void
    {
        $arr_1 = new ComparableTraitClass([1, 2, 3]);
        $arr_2 = new ComparableTraitClass([1, 2, 3]);
        $arr_3 = new ComparableTraitClass([1, 2, 3, 4]);

        $this->assertTrue($arr_1->equals($arr_2));
        $this->assertFalse($arr_1->equals($arr_3));

        $this->assertFalse($arr_1->greaterThan($arr_2));
        $this->assertFalse($arr_1->greaterThan($arr_3));

        $this->assertTrue($arr_1->greaterThanOrEqual($arr_2));
        $this->assertFalse($arr_1->greaterThanOrEqual($arr_3));

        $this->assertFalse($arr_1->lessThan($arr_2));
        $this->assertTrue($arr_1->lessThan($arr_3));

        $this->assertTrue($arr_1->lessThanOrEqual($arr_2));
        $this->assertTrue($arr_1->lessThanOrEqual($arr_3));
    }

    /**
     * Test failed comparison
     */
    public function testArrIncomparable(): void
    {
        $arr = new ComparableTraitClass([1, 2, 3]);
        $this->expectException('Phrity\Comparison\IncomparableException');
        $this->expectExceptionMessage('Can only compare Phrity\O\Test\Array\ComparableTraitClass');
        $arr->compare('Not comparable');
    }
}
