<?php

/**
 * File for O\Array\ArrayAccessTrait tests.
 * @package Phrity > O
 */

declare(strict_types=1);

namespace Phrity\O\Test\Array;

use ArrayAccess;
use Phrity\O\Array\ArrayAccessTrait;

/**
 * Generic O\Array\ArrayAccessTrait tests.
 */
class ArrayAccessTraitClass implements ArrayAccess
{
    use ArrayAccessTrait;

    public function __construct(array $data)
    {
        $this->{$this->o_source_ref} = $data;
    }
}
