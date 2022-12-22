<?php

/**
 * File for O\Array\QueueIteratorTrait tests.
 * @package Phrity > O
 */

declare(strict_types=1);

namespace Phrity\O\Test\Array;

use IteratorAggregate;
use Phrity\O\Array\QueueIteratorTrait;

/**
 * Generic O\Array\QueueIteratorTrait tests.
 */
class QueueIteratorTraitClass implements IteratorAggregate
{
    use QueueIteratorTrait;

    public function __construct(array $data)
    {
        $this->{$this->o_source_ref} = $data;
    }
}
