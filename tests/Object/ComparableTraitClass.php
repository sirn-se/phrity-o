<?php

/**
 * File for O\Object\ComparableTrait tests.
 * @package Phrity > O.
 */

declare(strict_types=1);

namespace Phrity\O\Test\Object;

use Phrity\O\Object\ComparableTrait;
use Phrity\Comparison\{
    Comparable,
    Equalable
};

/**
 * O\Object\ComparableTrait tests.
 */
class ComparableTraitClass implements Comparable, Equalable
{
    use ComparableTrait;

    public function __construct(object $data)
    {
        $this->{$this->o_source_ref} = $data;
    }
}
