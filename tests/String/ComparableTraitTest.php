<?php

/**
 * File for O\String\ComparableTrait tests.
 * @package Phrity > O.
 */

declare(strict_types=1);

namespace Phrity\O\Test\String;

use Phrity\O\Test\String\ComparableTraitClass;
use PHPUnit\Framework\TestCase;

/**
 * O\String\ComparableTrait tests.
 */
class ComparableTraitTest extends TestCase
{
    /**
     * Set up for all tests.
     */
    public function setUp(): void
    {
        error_reporting(-1);
    }

    /**
     * Test Str compare.
     */
    public function testStrCompare(): void
    {
        $str_1 = new ComparableTraitClass('aaa');
        $str_2 = new ComparableTraitClass('aaa');
        $str_3 = new ComparableTraitClass('bbb');

        $this->assertEquals(0, $str_1->compare($str_2));
        $this->assertEquals(-1, $str_1->compare($str_3));
        $this->assertEquals(1, $str_3->compare($str_2));
    }

    /**
     * Test compare wrapper methods.
     */
    public function testIntegerMethods(): void
    {
        $str_1 = new ComparableTraitClass('aaa');
        $str_2 = new ComparableTraitClass('aaa');
        $str_3 = new ComparableTraitClass('bbb');

        $this->assertTrue($str_1->equals($str_2));
        $this->assertFalse($str_1->equals($str_3));

        $this->assertFalse($str_1->greaterThan($str_2));
        $this->assertFalse($str_1->greaterThan($str_3));

        $this->assertTrue($str_1->greaterThanOrEqual($str_2));
        $this->assertFalse($str_1->greaterThanOrEqual($str_3));

        $this->assertFalse($str_1->lessThan($str_2));
        $this->assertTrue($str_1->lessThan($str_3));

        $this->assertTrue($str_1->lessThanOrEqual($str_2));
        $this->assertTrue($str_1->lessThanOrEqual($str_3));
    }

    /**
     * Test failed comparison.
     */
    public function testStringIncomparable(): void
    {
        $bool = new ComparableTraitClass('aaa');
        $this->expectException('Phrity\Comparison\IncomparableException');
        $this->expectExceptionMessage('Can only compare Phrity\O\Test\String\ComparableTraitClass');
        $bool->compare(1);
    }
}
