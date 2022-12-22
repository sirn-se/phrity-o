<?php

/**
 * File for O\Array\StringableTrait tests.
 * @package Phrity > O
 */

declare(strict_types=1);

namespace Phrity\O\Test\Array;

use Stringable;
use Phrity\O\Array\StringableTrait;

/**
 * Generic O\Array\StringableTrait tests.
 */
class StringableTraitClass implements Stringable
{
    use StringableTrait;

    public function __construct(array $data)
    {
        $this->{$this->o_source_ref} = $data;
    }
}
