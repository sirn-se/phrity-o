<?php

/**
 * File for O\Boolean\InvokableTrait tests.
 * @package Phrity > O
 */

declare(strict_types=1);

namespace Phrity\O\Test\Boolean;

use Phrity\O\Boolean\InvokableTrait;

/**
 * O\Boolean\InvokableTrait tests.
 */
class InvokableTraitClass
{
    use InvokableTrait;

    public function __construct(bool $data)
    {
        $this->{$this->o_source_ref} = $data;
    }
}
