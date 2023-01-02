<?php

namespace Phrity\O\Boolean;

use ArgumentCountError;

/**
 * Phrity\O\Boolean\InvokableTrait trait.
 */
trait InvokableTrait
{
    use TypeTrait;

    /**
     * Getter/setter implementation.
     * @param  bool ...$args Input data.
     * @return bool Current value.
     */
    public function __invoke(bool ...$args): bool
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
