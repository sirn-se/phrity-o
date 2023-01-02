<?php

namespace Phrity\O\Integer;

use ArgumentCountError;

/**
 * Phrity\O\Integer\InvokableTrait trait.
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
