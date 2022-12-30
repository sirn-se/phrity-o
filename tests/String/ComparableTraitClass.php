<?php

/**
 * File for O\String\ComparableTrait tests.
 * @package Phrity > O
 */

declare(strict_types=1);

namespace Phrity\O\Test\String;

use Phrity\O\String\ComparableTrait;
use Phrity\Comparison\{
    Comparable,
    Equalable
};

/**
 * O\String\ComparableTrait tests.
 */
class ComparableTraitClass implements Comparable, Equalable
{
    use ComparableTrait;

    public function __construct(string $data)
    {
        $this->{$this->o_source_ref} = $data;
    }
}
