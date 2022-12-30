<?php

/**
 * File for O\Number\StringableTrait tests.
 * @package Phrity > O.
 */

declare(strict_types=1);

namespace Phrity\O\Test\Number;

use Stringable;
use Phrity\O\Number\StringableTrait;

/**
 * Generic O\Number\StringableTrait tests.
 */
class StringableTraitClass implements Stringable
{
    use StringableTrait;

    public function __construct(float $data)
    {
        $this->{$this->o_source_ref} = $data;
    }
}
