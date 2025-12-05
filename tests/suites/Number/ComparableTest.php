<?php

declare(strict_types=1);

namespace Phrity\O\Test\Number;

use PHPUnit\Framework\TestCase;

/**
 * Phrity\O\Number\ComparableTrait tests.
 */
class ComparableTest extends TestCase
{
    public function setUp(): void
    {
        error_reporting(-1);
    }

    public function testCompare(): void
    {
        $num_1 = new ImplClass(5.6);
        $num_2 = new ImplClass(5.6);
        $num_3 = new ImplClass(7.8);

        $this->assertEquals(0, $num_1->compare($num_2));
        $this->assertEquals(-1, $num_1->compare($num_3));
        $this->assertEquals(1, $num_3->compare($num_2));
    }

    public function testComparisonMethods(): void
    {
        $num_1 = new ImplClass(5.6);
        $num_2 = new ImplClass(5.6);
        $num_3 = new ImplClass(7.8);

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

    public function testIncomparable(): void
    {
        $bool = new ImplClass(5.6);
        $this->expectException('Phrity\Comparison\IncomparableException');
        $this->expectExceptionMessage('Can only compare Phrity\O\Test\Number\ImplClass');
        $bool->compare('Not comparable');
    }
}
