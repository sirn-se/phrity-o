<?php

/**
 * File for O\Boolean\StringableTrait tests.
 * @package Phrity > O
 */

declare(strict_types=1);

namespace Phrity\O\Test\Boolean;

use Stringable;
use Phrity\O\Boolean\StringableTrait;

/**
 * Generic O\Boolean\StringableTrait tests.
 */
class StringableTraitClass implements Stringable
{
    use StringableTrait;

    public function __construct(bool $data)
    {
        $this->{$this->o_source_ref} = $data;
    }
}
