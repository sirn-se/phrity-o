<?php

namespace Phrity\O\Object;

use stdClass;
use TypeError;

/**
 * Phrity\O\Object\CoercionTrait trait.
 */
trait CoercionTrait
{
    use TypeTrait;

    /**
     * Internal coercion method.
     * @param mixed $value Value to coerce.
     * @return object Resulting value.
     * @throws TypeError If invalid value provided.
     */
    protected function coerce(mixed $value): object
    {
        if ($value instanceof stdClass) {
            return $value;
        }
        if (!$this->o_option_coerce) {
            throw new TypeError('Input must be of type object.');
        }
        if (is_null($value)) {
            return new stdClass();
        }
        if ($value instanceof self) {
            return $value->{$value->o_source_ref};
        }
        if (is_object($value)) {
            return (object)get_object_vars($value);
        }
        if (is_array($value)) {
            return (object)$value;
        }
        throw new TypeError('Input must be usable as type object.');
    }
}
