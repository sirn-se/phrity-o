<?php

/**
 * File for O\String\InvokableTrait tests.
 * @package Phrity > O
 */

declare(strict_types=1);

namespace Phrity\O\Test\String;

use Phrity\O\String\InvokableTrait;

/**
 * O\String\InvokableTrait tests.
 */
class InvokableTraitClass
{
    use InvokableTrait;

    public function __construct(string $data)
    {
        $this->{$this->o_source_ref} = $data;
    }
}
