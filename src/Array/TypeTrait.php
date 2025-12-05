<?php

namespace Phrity\O\Array;

/**
 * Phrity\O\Array\TypeTrait trait.
 */
trait TypeTrait
{
    /** @var array<array-key, mixed> $o_array_source */
    protected array $o_array_source;
    protected string $o_source_ref = 'o_array_source';
    protected bool $o_option_coerce = false;
    protected bool $o_option_access_supress_error = false;

    /**
     * Initializer, typically called in constructor.
     * @param array<array-key, mixed>  $value Initial value.
     */
    protected function initialize(array $value = []): void
    {
        if (!isset($this->{$this->o_source_ref})) {
            $this->{$this->o_source_ref} = $value;
        }
    }
}
