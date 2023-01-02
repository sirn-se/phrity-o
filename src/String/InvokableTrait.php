<?php

namespace Phrity\O\String;

/**
 * Phrity\O\String\InvokableTrait trait.
 */
trait InvokableTrait
{
    use TypeTrait;

    /**
     * Getter/setter implementation.
     * @param  string ...$args Input data.
     * @return string Current value.
     */
    public function __invoke(string ...$args): string
    {
        switch (count($args)) {
            case 0:
                // Get call.
                return $this->{$this->o_source_ref};
            case 1:
                // Set call.
                return $this->{$this->o_source_ref} = array_shift($args);
            default:
                throw new ArgumentCountError('Too many arguments.');
        }
    }
}
