<?php

/**
 * File for O\Array\CountableTrait tests.
 * @package Phrity > O
 */

declare(strict_types=1);

namespace Phrity\O\Test\Array;

use Countable;
use Phrity\O\Array\CountableTrait;

/**
 * Generic O\Array\CountableTrait tests.
 */
class CountableTraitClass implements Countable
{
    use CountableTrait;

    public function __construct(array $data)
    {
        $this->{$this->o_source_ref} = $data;
    }
}
