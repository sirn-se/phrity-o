<?php

namespace Phrity\O\String;

/**
 * Phrity\O\String\TypeTrait trait.
 */
trait TypeTrait
{
    protected string $o_string_source;
    protected string $o_source_ref = 'o_string_source';
    protected bool $o_option_coerce = false;

    /**
     * Initializer, typically called in constructor.
     * @param string $value Initial value.
     */
    protected function initialize(string $value = ''): void
    {
        if (!isset($this->{$this->o_source_ref})) {
            $this->{$this->o_source_ref} = $value;
        }
    }
}
