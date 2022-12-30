<?php

/**
 * File for O\Integer\StringableTrait tests.
 * @package Phrity > O
 */

declare(strict_types=1);

namespace Phrity\O\Test\Integer;

use Stringable;
use Phrity\O\Integer\StringableTrait;

/**
 * Generic O\Integer\StringableTrait tests.
 */
class StringableTraitClass implements Stringable
{
    use StringableTrait;

    public function __construct(int $data)
    {
        $this->{$this->o_source_ref} = $data;
    }
}
