<?php

/**
 * File for O\Integer\InvokableTrait trait.
 * @package Phrity > O
 */

namespace Phrity\O\Integer;

/**
 * O\Integer\InvokableTrait trait.
 */
trait InvokableTrait
{
    use TypeTrait;

    /**
     * Getter/setter implementation.
     * @param  int ...$args Input data.
     * @return int Current value.
     */
    public function __invoke(int ...$args): int
    {
        // Get call
        if (empty($args)) {
            return $this->{$this->o_source_ref};
        }
        // Set call
        return $this->{$this->o_source_ref} = array_shift($args);
    }
}
