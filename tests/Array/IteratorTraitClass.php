<?php

/**
 * File for O\Array\IteratorTrait tests.
 * @package Phrity > O
 */

declare(strict_types=1);

namespace Phrity\O\Test\Array;

use Iterator;
use Phrity\O\Array\IteratorTrait;

/**
 * Generic O\Array\IteratorTrait tests.
 */
class IteratorTraitClass implements Iterator
{
    use IteratorTrait;

    public function __construct(array $data)
    {
        $this->{$this->o_source_ref} = $data;
    }
}
