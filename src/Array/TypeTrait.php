<?php

namespace Phrity\O\Array;

/**
 * Phrity\O\Array\TypeTrait trait.
 */
trait TypeTrait
{
    protected array $o_array_source;
    protected string $o_source_ref = 'o_array_source';
    protected bool $o_option_coerce = false;

    /**
     * Initializer, typically called in constructor.
     * @param object $value Initial value.
     */
    protected function initialize(array $value = []): void
    {
        if (!isset($this->{$this->o_source_ref})) {
            $this->{$this->o_source_ref} = $value;
        }
    }
}
