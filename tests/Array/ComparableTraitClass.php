<?php

/**
 * File for O\Array\ComparableTrait tests.
 * @package Phrity > O
 */

declare(strict_types=1);

namespace Phrity\O\Test\Array;

use Stringable;
use Phrity\O\Array\ComparableTrait;
use Phrity\Comparison\{
    Comparable,
    Equalable,
    ComparisonTrait
};

/**
 * Generic O\Array\ComparableTrait tests.
 */
class ComparableTraitClass implements Comparable, Equalable
{
    use ComparableTrait;
    use ComparisonTrait;

    public function __construct(array $data)
    {
        $this->{$this->o_source_ref} = $data;
    }
}
