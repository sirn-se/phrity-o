<?php

/**
 * File for O\Object\StringableTrait tests.
 * @package Phrity > O.
 */

declare(strict_types=1);

namespace Phrity\O\Test\Object;

use Stringable;
use Phrity\O\Object\StringableTrait;

/**
 * Generic O\Object\StringableTrait tests.
 */
class StringableTraitClass implements Stringable
{
    use StringableTrait;

    public function __construct(object $data)
    {
        $this->{$this->o_source_ref} = $data;
    }
}
