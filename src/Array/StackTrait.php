<?php

/**
 * File for O\Array\StackTrait trait.
 * @package Phrity > O
 */

namespace Phrity\O\Array;

use Traversable;

/**
 * O\Array\StackTrait trait.
 */
trait StackTrait
{
    protected array $o_array_source = [];
    protected string $o_source_ref = 'o_array_source';

    /**
     * Add item to the top of stack.
     * @param mixed $item Item to add.
     */
    public function push(mixed $item): void
    {
        array_unshift($this->{$this->o_source_ref}, $item);
    }

    /**
     * Retrieve item from stack.
     * @return mixed $item Get and remove top item in stack.
     */
    public function pop(): mixed
    {
        return array_shift($this->{$this->o_source_ref});
    }
}
