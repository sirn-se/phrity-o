<?php

/**
 * File for O\Obj class.
 * @package Phrity > O
 */

namespace Phrity\O;

/**
 * O\Obj class.
 */
class Obj implements \Phrity\Comparison\Comparable
{
    use \Phrity\Comparison\ComparisonTrait;

    /**
     * Internal data structure
     */
    protected $o_content;

    /**
     * Constructor for O\Obj
     * @param mixed $args Input data
     */
    public function __construct(...$args)
    {
        // Allow subclass to use additional input
        $content = array_shift($args);
        $this->bind($content);

        if (!empty($args)) {
            throw new \InvalidArgumentException('Unsupported argument for O\Obj');
        }
    }


    // Property access methods

    /**
     * Returns the value of specified property
     * @param  mixed $key The property to retrieve
     * @return mixed      Value for property
     */
    public function __get($key)
    {
        return $this->o_content->$key;
    }

    /**
     * Assigns a value on specified property
     * @param mixed $key    The property to assign the value to
     * @param mixed $value  The value to set
     */
    public function __set($key, $value): void
    {
        $this->o_content->$key = $value;
    }

    /**
     * Whether a property exists
     * @param  mixed $key A property to check for
     * @return            True if property exist
     */
    public function __isset($key): bool
    {
        return isset($this->o_content->$key);
    }

    /**
     * Unsets a property
     * @param mixed $key The property to unset
     */
    public function __unset($key): void
    {
        unset($this->o_content->$key);
    }


    // String representation methods

    /**
     * Return string representation
     * @return string
     */
    public function __toString(): string
    {
        return self::class;
    }


    // Comparable interface implementation

    /**
     * Compare $this with provided instance of the same class
     * @param  Obj $compare_with The object to compare with
     * @return int               -1, 0 or +1 comparison result
     */
    public function compare($compare_with): int
    {
        if (!$compare_with instanceof self) {
            throw new \Phrity\Comparison\IncomparableException('Can only compare O\Obj');
        }
        if ($this->o_content == $compare_with->o_content) {
            return 0;
        }
        return $this->o_content > $compare_with->o_content ? +1 : -1;
    }


    // Protected internal methods

    /**
     * Bind provided data to internal structure
     * @param  mixed $content Input data
     * @return object         The internal structure
     */
    protected function bind($content)
    {
        if (is_null($content)) {
            return $this->o_content = new \stdclass();
        }
        if ($content instanceof self) {
            return $this->o_content = $content->o_content;
        }
        if ($content instanceof \stdclass) {
            return $this->o_content = $content;
        }
        if (is_object($content) || is_array($content)) {
            // Converts to stdclass, only public properties if input is object
            return $this->o_content = json_decode(json_encode($content, JSON_FORCE_OBJECT));
        }
        throw new \InvalidArgumentException('Unsupported input data for O\Obj');
    }
}
