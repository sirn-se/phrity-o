<?php

/**
 * File for O\Array\StackIteratorTrait tests.
 * @package Phrity > O
 */

declare(strict_types=1);

namespace Phrity\O\Test\Array;

use IteratorAggregate;
use Phrity\O\Array\StackIteratorTrait;

/**
 * Generic O\Array\StackIteratorTrait tests.
 */
class StackIteratorTraitClass implements IteratorAggregate
{
    use StackIteratorTrait;

    public function __construct(array $data)
    {
        $this->{$this->o_source_ref} = $data;
    }
}
