<?php

declare(strict_types=1);

namespace Phrity\O\Test\Boolean;

use PHPUnit\Framework\TestCase;

/**
 * Phrity\O\Boolean\ComparableTrait tests.
 */
class ComparableTest extends TestCase
{
    public function setUp(): void
    {
        error_reporting(-1);
    }

    public function testCompare(): void
    {
        $bool_1 = new ImplClass(false);
        $bool_2 = new ImplClass(false);
        $bool_3 = new ImplClass(true);

        $this->assertEquals(0, $bool_1->compare($bool_2));
        $this->assertEquals(-1, $bool_1->compare($bool_3));
        $this->assertEquals(1, $bool_3->compare($bool_2));
    }

    public function testComparisonMethods(): void
    {
        $bool_1 = new ImplClass(false);
        $bool_2 = new ImplClass(false);
        $bool_3 = new ImplClass(true);

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

    public function testIncomparable(): void
    {
        $bool = new ImplClass(false);
        $this->expectException('Phrity\Comparison\IncomparableException');
        $this->expectExceptionMessage('Can only compare Phrity\O\Test\Boolean\ImplClass');
        $bool->compare('Not comparable');
    }
}
