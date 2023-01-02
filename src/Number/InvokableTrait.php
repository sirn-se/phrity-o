<?php

namespace Phrity\O\Number;

use ArgumentCountError;

/**
 * Phrity\O\Number\InvokableTrait trait.
 */
trait InvokableTrait
{
    use TypeTrait;

    /**
     * Getter/setter implementation.
     * @param  float ...$args Input data.
     * @return float Current value.
     */
    public function __invoke(float ...$args): float
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
