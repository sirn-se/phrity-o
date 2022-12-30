<?php

/**
 * File for O\Boolean\ComparableTrait tests.
 * @package Phrity > O
 */

declare(strict_types=1);

namespace Phrity\O\Test\Boolean;

use Phrity\O\Boolean\ComparableTrait;
use Phrity\Comparison\{
    Comparable,
    Equalable
};

/**
 * O\Boolean\ComparableTrait tests.
 */
class ComparableTraitClass implements Comparable, Equalable
{
    use ComparableTrait;

    public function __construct(bool $data)
    {
        $this->{$this->o_source_ref} = $data;
    }
}
