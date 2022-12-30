<?php

/**
 * File for O\Number\ComparableTrait tests.
 * @package Phrity > O
 */

declare(strict_types=1);

namespace Phrity\O\Test\Number;

use Phrity\O\Number\ComparableTrait;
use Phrity\Comparison\{
    Comparable,
    Equalable
};

/**
 * O\Number\ComparableTrait tests.
 */
class ComparableTraitClass implements Comparable, Equalable
{
    use ComparableTrait;

    public function __construct(float $data)
    {
        $this->{$this->o_source_ref} = $data;
    }
}
