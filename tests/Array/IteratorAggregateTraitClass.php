<?php

/**
 * File for O\Array\IteratorAggregateTrait tests.
 * @package Phrity > O
 */

declare(strict_types=1);

namespace Phrity\O\Test\Array;

use IteratorAggregate;
use Phrity\O\Array\IteratorAggregateTrait;

/**
 * Generic O\Array\IteratorAggregateTrait tests.
 */
class IteratorAggregateTraitClass implements IteratorAggregate
{
    use IteratorAggregateTrait;

    public function __construct(array $data)
    {
        $this->{$this->o_source_ref} = $data;
    }
}
