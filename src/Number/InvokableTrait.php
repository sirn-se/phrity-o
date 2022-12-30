<?php

/**
 * File for O\Number\InvokableTrait trait.
 * @package Phrity > O.
 */

namespace Phrity\O\Number;

/**
 * O\Number\InvokableTrait trait.
 */
trait InvokableTrait
{
    protected float $o_number_source = 0.0;
    protected string $o_source_ref = 'o_number_source';

    /**
     * Getter/setter implementation.
     * @param  float ...$args Input data.
     * @return float Current value.
     */
    public function __invoke(float ...$args): float
    {
        // Get call
        if (empty($args)) {
            return $this->{$this->o_source_ref};
        }
        // Set call
        return $this->{$this->o_source_ref} = array_shift($args);
    }
}
