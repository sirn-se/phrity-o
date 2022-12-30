<?php

/**
 * File for O\Object\PropertyAccessTrait tests.
 * @package Phrity > O.
 */

declare(strict_types=1);

namespace Phrity\O\Test\Object;

use Phrity\O\Object\PropertyAccessTrait;

/**
 * Generic O\Object\PropertyAccessTrait tests.
 */
class PropertyAccessTraitClass
{
    use PropertyAccessTrait;

    public function __construct(object $data)
    {
        $this->{$this->o_source_ref} = $data;
    }
}
