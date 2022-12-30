<?php

/**
 * File for O\Boolean\InvokableTrait trait.
 * @package Phrity > O
 */

namespace Phrity\O\Boolean;

/**
 * O\Boolean\InvokableTrait trait.
 */
trait InvokableTrait
{
    protected bool $o_boolean_source = false;
    protected string $o_source_ref = 'o_boolean_source';

    /**
     * Getter/setter implementation.
     * @param  bool ...$args Input data.
     * @return bool Current value.
     */
    public function __invoke(bool ...$args): bool
    {
        // Get call
        if (empty($args)) {
            return $this->{$this->o_source_ref};
        }
        // Set call
        return $this->{$this->o_source_ref} = array_shift($args);
    }
}
