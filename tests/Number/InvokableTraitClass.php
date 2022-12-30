<?php

/**
 * File for O\Number\InvokableTrait tests.
 * @package Phrity > O
 */

declare(strict_types=1);

namespace Phrity\O\Test\Number;

use Phrity\O\Number\InvokableTrait;

/**
 * O\Number\InvokableTrait tests.
 */
class InvokableTraitClass
{
    use InvokableTrait;

    public function __construct(float $data)
    {
        $this->{$this->o_source_ref} = $data;
    }
}
