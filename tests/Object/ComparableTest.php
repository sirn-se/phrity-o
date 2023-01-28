<?php

declare(strict_types=1);

namespace Phrity\O\Test\Object;

use PHPUnit\Framework\TestCase;

/**
 * Phrity\O\Object\ComparableTrait tests.
 */
class ComparableTest extends TestCase
{
    public function setUp(): void
    {
        error_reporting(-1);
    }

    public function testCompare(): void
    {
        $obj_1 = new ImplClass((object)['a' => 1, 'b' => 2, 'c' => 3]);
        $obj_2 = new ImplClass((object)['a' => 1, 'b' => 2, 'c' => 3]);
        $obj_3 = new ImplClass((object)['a' => 1, 'b' => 2, 'c' => 3, 'd' => 4]);

        $this->assertEquals(0, $obj_1->compare($obj_2));
        $this->assertEquals(-1, $obj_1->compare($obj_3));
        $this->assertEquals(1, $obj_3->compare($obj_2));
    }

    public function testComparisonMethods(): void
    {
        $obj_1 = new ImplClass((object)['a' => 1, 'b' => 2, 'c' => 3]);
        $obj_2 = new ImplClass((object)['a' => 1, 'b' => 2, 'c' => 3]);
        $obj_3 = new ImplClass((object)['a' => 1, 'b' => 2, 'c' => 3, 'd' => 4]);

        $this->assertTrue($obj_1->equals($obj_2));
        $this->assertFalse($obj_1->equals($obj_3));

        $this->assertFalse($obj_1->greaterThan($obj_2));
        $this->assertFalse($obj_1->greaterThan($obj_3));

        $this->assertTrue($obj_1->greaterThanOrEqual($obj_2));
        $this->assertFalse($obj_1->greaterThanOrEqual($obj_3));

        $this->assertFalse($obj_1->lessThan($obj_2));
        $this->assertTrue($obj_1->lessThan($obj_3));

        $this->assertTrue($obj_1->lessThanOrEqual($obj_2));
        $this->assertTrue($obj_1->lessThanOrEqual($obj_3));
    }

    public function testIncomparable(): void
    {
        $bool = new ImplClass((object)['a' => 1, 'b' => 2, 'c' => 3]);
        $this->expectException('Phrity\Comparison\IncomparableException');
        $this->expectExceptionMessage('Can only compare Phrity\O\Test\Object\ImplClass');
        $bool->compare('Not comparable');
    }
}
