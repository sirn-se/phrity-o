<?php

/**
 * File for O\Integer\InvokableTrait tests.
 * @package Phrity > O
 */

declare(strict_types=1);

namespace Phrity\O\Test\Integer;

use Phrity\O\Integer\InvokableTrait;

/**
 * O\Integer\InvokableTrait tests.
 */
class InvokableTraitClass
{
    use InvokableTrait;

    public function __construct(int $data)
    {
        $this->{$this->o_source_ref} = $data;
    }
}
