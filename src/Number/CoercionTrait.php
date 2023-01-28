<?php

namespace Phrity\O\Number;

use TypeError;

/**
 * Phrity\O\Number\CoercionTrait trait.
 */
trait CoercionTrait
{
    use TypeTrait;

    /**
     * Internal coercion method.
     * @param mixed $value Value to coerce.
     * @return float Resulting value.
     * @throws TypeError If invalid value provided.
     */
    protected function coerce(mixed $value): float
    {
        if (is_float($value)) {
            return $value;
        }
        if (!$this->o_option_coerce) {
            throw new TypeError('Input must be of type float.');
        }
        if (is_null($value)) {
            return 0.0;
        }
        if ($value instanceof self) {
            return $value->{$value->o_source_ref};
        }
        if (is_numeric($value)) {
            $float_value = (float)$value;
            if ($float_value == $value) {
                return $float_value;
            }
        }
        throw new TypeError('Input must be usable as type float.');
    }
}
