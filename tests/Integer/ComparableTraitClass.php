<?php

/**
 * File for O\Integer\ComparableTrait tests.
 * @package Phrity > O
 */

declare(strict_types=1);

namespace Phrity\O\Test\Integer;

use Phrity\O\Integer\ComparableTrait;
use Phrity\Comparison\{
    Comparable,
    Equalable
};

/**
 * O\Integer\ComparableTrait tests.
 */
class ComparableTraitClass implements Comparable, Equalable
{
    use ComparableTrait;

    public function __construct(int $data)
    {
        $this->{$this->o_source_ref} = $data;
    }
}
