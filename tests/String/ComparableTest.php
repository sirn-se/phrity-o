<?php

declare(strict_types=1);

namespace Phrity\O\Test\String;

use PHPUnit\Framework\TestCase;

/**
 * Phrity\O\String\ComparableTrait tests.
 */
class ComparableTraitTest extends TestCase
{
    public function setUp(): void
    {
        error_reporting(-1);
    }

    public function testStrCompare(): void
    {
        $str_1 = new ImplClass('aaa');
        $str_2 = new ImplClass('aaa');
        $str_3 = new ImplClass('bbb');

        $this->assertEquals(0, $str_1->compare($str_2));
        $this->assertEquals(-1, $str_1->compare($str_3));
        $this->assertEquals(1, $str_3->compare($str_2));
    }

    public function testIntegerMethods(): void
    {
        $str_1 = new ImplClass('aaa');
        $str_2 = new ImplClass('aaa');
        $str_3 = new ImplClass('bbb');

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

    public function testStringIncomparable(): void
    {
        $bool = new ImplClass('aaa');
        $this->expectException('Phrity\Comparison\IncomparableException');
        $this->expectExceptionMessage('Can only compare Phrity\O\Test\String\ImplClass');
        $bool->compare(1);
    }
}
