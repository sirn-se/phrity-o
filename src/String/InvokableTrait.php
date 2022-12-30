<?php

/**
 * File for O\String\InvokableTrait trait.
 * @package Phrity > O.
 */

namespace Phrity\O\String;

/**
 * O\String\InvokableTrait trait.
 */
trait InvokableTrait
{
    protected string $o_string_source = '';
    protected string $o_source_ref = 'o_string_source';

    /**
     * Getter/setter implementation.
     * @param  string ...$args Input data.
     * @return string Current value.
     */
    public function __invoke(string ...$args): string
    {
        // Get call
        if (empty($args)) {
            return $this->{$this->o_source_ref};
        }
        // Set call
        return $this->{$this->o_source_ref} = array_shift($args);
    }
}
