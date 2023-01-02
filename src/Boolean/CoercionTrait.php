<?php

namespace Phrity\O\Boolean;

use TypeError;

/**
 * Phrity\O\Boolean\CoercionTrait trait.
 */
trait CoercionTrait
{
    use TypeTrait;

    /**
     * Internal coercion method.
     * @param mixed $value Value to coerce.
     * @return bool Resulting value.
     * @throws TypeError If invalid value provided.
     */
    protected function coerce(mixed $value): bool
    {
        if (is_bool($value)) {
            return $value;
        }
        if (!$this->o_option_coerce) {
            throw new TypeError('Input must be of type bool.');
        }
        if (is_null($value)) {
            return false;
        }
        if ($value instanceof self) {
            return $value->{$value->o_source_ref};
        }
        if (is_numeric($value)) {
            return (bool)$value;
        }
        throw new TypeError('Input must be usable as type bool.');
    }
}
