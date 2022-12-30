<?php

/**
 * File for O\Number\ComparableTrait tests.
 * @package Phrity > O.
 */

declare(strict_types=1);

namespace Phrity\O\Test\Number;

use Phrity\O\Test\Number\ComparableTraitClass;
use PHPUnit\Framework\TestCase;

/**
 * O\Number\ComparableTrait tests.
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
     * Test Number compare.
     */
    public function testNumberCompare(): void
    {
        $num_1 = new ComparableTraitClass(5.6);
        $num_2 = new ComparableTraitClass(5.6);
        $num_3 = new ComparableTraitClass(7.8);

        $this->assertEquals(0, $num_1->compare($num_2));
        $this->assertEquals(-1, $num_1->compare($num_3));
        $this->assertEquals(1, $num_3->compare($num_2));
    }

    /**
     * Test compare wrapper methods.
     */
    public function testNumberMethods(): void
    {
        $num_1 = new ComparableTraitClass(5.6);
        $num_2 = new ComparableTraitClass(5.6);
        $num_3 = new ComparableTraitClass(7.8);

        $this->assertTrue($num_1->equals($num_2));
        $this->assertFalse($num_1->equals($num_3));

        $this->assertFalse($num_1->greaterThan($num_2));
        $this->assertFalse($num_1->greaterThan($num_3));

        $this->assertTrue($num_1->greaterThanOrEqual($num_2));
        $this->assertFalse($num_1->greaterThanOrEqual($num_3));

        $this->assertFalse($num_1->lessThan($num_2));
        $this->assertTrue($num_1->lessThan($num_3));

        $this->assertTrue($num_1->lessThanOrEqual($num_2));
        $this->assertTrue($num_1->lessThanOrEqual($num_3));
    }

    /**
     * Test failed comparison.
     */
    public function testNumberIncomparable(): void
    {
        $bool = new ComparableTraitClass(5.6);
        $this->expectException('Phrity\Comparison\IncomparableException');
        $this->expectExceptionMessage('Can only compare Phrity\O\Test\Number\ComparableTraitClass');
        $bool->compare('Not comparable');
    }
}
