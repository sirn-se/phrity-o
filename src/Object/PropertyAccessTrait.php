<?php

/**
 * File for O\Object\PropertyAccessTrait trait.
 * @package Phrity > O.
 */

namespace Phrity\O\Object;

use Error;
use Phrity\Comparison\{
    ComparisonTrait,
    IncomparableException
};

/**
 * O\Object\PropertyAccessTrait trait.
 */
trait PropertyAccessTrait
{
    protected object $o_object_source;
    protected string $o_source_ref = 'o_object_source';


    // Property access methods

    /**
     * Returns the value of specified property.
     * @param  string $key The property to retrieve.
     * @return mixed Value for property.
     * @throws Error If specified property do not exist.
     */
    public function __get(string $key): mixed
    {
        if (!$this->__isset($key)) {
            throw new Error("Undefined object property {$key}");
        }
        return $this->{$this->o_source_ref}->$key;
    }

    /**
     * Assigns a value on specified property.
     * @param string $key The property to assign the value to.
     * @param mixed $value The value to set.
     */
    public function __set(string $key, mixed $value): void
    {
        if (!$this->__isset($key)) {
            $this->{$this->o_source_ref} = (object)[];
        }
        $this->{$this->o_source_ref}->$key = $value;
    }

    /**
     * Whether a property exists.
     * @param string $key A property to check for.
     * @return True if property exist.
     */
    public function __isset(string $key): bool
    {
        return isset($this->{$this->o_source_ref}) && property_exists($this->{$this->o_source_ref}, $key);
    }

    /**
     * Unsets a property.
     * @param string $key The property to unset.
     */
    public function __unset(string $key): void
    {
        if ($this->__isset($key)) {
            unset($this->{$this->o_source_ref}->$key);
        }
    }
}
