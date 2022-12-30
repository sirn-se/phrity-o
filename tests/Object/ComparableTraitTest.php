<?php

/**
 * File for O\Object\ComparableTrait tests.
 * @package Phrity > O.
 */

declare(strict_types=1);

namespace Phrity\O\Test\Object;

use Phrity\O\Test\Object\ComparableTraitClass;
use PHPUnit\Framework\TestCase;

/**
 * O\Object\ComparableTrait tests.
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
     * Test Object compare.
     */
    public function testObjectCompare(): void
    {
        $obj_1 = new ComparableTraitClass((object)['a' => 1, 'b' => 2, 'c' => 3]);
        $obj_2 = new ComparableTraitClass((object)['a' => 1, 'b' => 2, 'c' => 3]);
        $obj_3 = new ComparableTraitClass((object)['a' => 1, 'b' => 2, 'c' => 3, 'd' => 4]);

        $this->assertEquals(0, $obj_1->compare($obj_2));
        $this->assertEquals(-1, $obj_1->compare($obj_3));
        $this->assertEquals(1, $obj_3->compare($obj_2));
    }

    /**
     * Test compare wrapper methods.
     */
    public function testCompareMethods(): void
    {
        $obj_1 = new ComparableTraitClass((object)['a' => 1, 'b' => 2, 'c' => 3]);
        $obj_2 = new ComparableTraitClass((object)['a' => 1, 'b' => 2, 'c' => 3]);
        $obj_3 = new ComparableTraitClass((object)['a' => 1, 'b' => 2, 'c' => 3, 'd' => 4]);

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

    /**
     * Test failed comparison.
     */
    public function testIncomparable(): void
    {
        $bool = new ComparableTraitClass((object)['a' => 1, 'b' => 2, 'c' => 3]);
        $this->expectException('Phrity\Comparison\IncomparableException');
        $this->expectExceptionMessage('Can only compare Phrity\O\Test\Object\ComparableTraitClass');
        $bool->compare('Not comparable');
    }
}
