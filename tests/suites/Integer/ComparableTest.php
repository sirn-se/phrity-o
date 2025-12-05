<?php

declare(strict_types=1);

namespace Phrity\O\Test\Integer;

use PHPUnit\Framework\TestCase;

/**
 * Phrity\O\Integer\ComparableTrait tests.
 */
class ComparableTest extends TestCase
{
    public function setUp(): void
    {
        error_reporting(-1);
    }

    public function testCompare(): void
    {
        $int_1 = new ImplClass(56);
        $int_2 = new ImplClass(56);
        $int_3 = new ImplClass(78);

        $this->assertEquals(0, $int_1->compare($int_2));
        $this->assertEquals(-1, $int_1->compare($int_3));
        $this->assertEquals(1, $int_3->compare($int_2));
    }

    public function testComparisonMethods(): void
    {
        $int_1 = new ImplClass(56);
        $int_2 = new ImplClass(56);
        $int_3 = new ImplClass(78);

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

    public function testIncomparable(): void
    {
        $int = new ImplClass(26);
        $this->expectException('Phrity\Comparison\IncomparableException');
        $this->expectExceptionMessage('Can only compare Phrity\O\Test\Integer\ImplClass');
        $int->compare('Not comparable');
    }
}
