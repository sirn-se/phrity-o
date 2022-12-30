<?php

/**
 * File for O\String\StringableTrait tests.
 * @package Phrity > O.
 */

declare(strict_types=1);

namespace Phrity\O\Test\String;

use Stringable;
use Phrity\O\String\StringableTrait;

/**
 * Generic O\String\StringableTrait tests.
 */
class StringableTraitClass implements Stringable
{
    use StringableTrait;

    public function __construct(string $data)
    {
        $this->{$this->o_source_ref} = $data;
    }
}
