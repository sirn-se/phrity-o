<?php

/**
 * File for O\Arr class.
 * @package Phrity > O
 */

namespace Phrity\O;

/**
 * O\Arr class.
 */
class Arr implements \ArrayAccess, \Countable, \Iterator, \Phrity\Comparison\Comparable, \Stringable
{
    use \Phrity\Comparison\ComparisonTrait;

    /**
     * Internal data structure
     */
    protected $o_content;

    /**
     * Constructor for O\Arr
     * @param mixed $args Input data
     */
    public function __construct(mixed ...$args)
    {
        // Allow subclass to use additional input
        $content = array_shift($args);
        $this->bind($content);

        if (!empty($args)) {
            throw new \InvalidArgumentException('Unsupported argument for O\Arr');
        }
    }


    // ArrayAccess interface implementation

    /**
     * Whether an offset exists
     * @param  mixed $offset An offset to check for
     * @return               True if offset exist
     */
    public function offsetExists(mixed $offset): bool
    {
        return array_key_exists($offset, $this->o_content);
    }

    /**
     * Returns the value at specified offset
     * @param  mixed $offset The offset to retrieve
     * @return mixed         Value for offset
     */
    public function offsetGet(mixed $offset): mixed
    {
        return $this->o_content[$offset];
    }

    /**
     * Assigns a value to the specified offset
     * @param mixed $offset The offset to assign the value to
     * @param mixed $value  The value to set
     */
    public function offsetSet(mixed $offset, mixed $value): void
    {
        if (is_null($offset)) {
            $this->o_content[] = $value;
        } else {
            $this->o_content[$offset] = $value;
        }
    }

    /**
     * Unsets an offset
     * @param mixed $offset The offset to unset
     */
    public function offsetUnset(mixed $offset): void
    {
        unset($this->o_content[$offset]);
    }


    // Countable interface implementation

    /**
     * Count elements of an object
     * @return int Number of elements
     */
    public function count(): int
    {
        return count($this->o_content);
    }


    // Iterator interface implementation

    /**
     * Return the current element
     * @return mixed Current element
     */
    public function current(): mixed
    {
        return current($this->o_content);
    }

    /**
     * Return the key of the current element
     * @return scalar|null Current key
     */
    public function key(): mixed
    {
        return key($this->o_content);
    }

    /**
     * Move forward to next element
     */
    public function next(): void
    {
        next($this->o_content);
    }

    /**
     * Rewind the Iterator to the first element
     */
    public function rewind(): void
    {
        reset($this->o_content);
    }

    /**
     * Checks if current position is valid
     * @return bool True if valid
     */
    public function valid(): bool
    {
        return $this->offsetExists(key($this->o_content));
    }


    // Iterators (not in Iterator interface)

    /**
     * Move backward to previous element
     * @return mixed Returns the value in the previous position
     */
    public function previous(): mixed
    {
        return prev($this->o_content);
    }

    /**
     * Advance the Iterator to the last element
     * @return mixed Returns the value of the last element
     */
    public function forward(): mixed
    {
        return end($this->o_content);
    }


    // String representation methods

    /**
     * Return string representation
     * @return string
     */
    public function __toString(): string
    {
        return self::class . "({$this->count()})";
    }


    // Comparable interface implementation

    /**
     * Compare $this with provided instance of the same class
     * @param  Arr $compare_with The object to compare with
     * @return int               -1, 0 or +1 comparison result
     */
    public function compare(mixed $compare_with): int
    {
        if (!$compare_with instanceof self) {
            throw new \Phrity\Comparison\IncomparableException('Can only compare O\Arr');
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
     * @return array          The internal structure
     */
    protected function bind(mixed $content): array
    {
        if (is_null($content)) {
            return $this->o_content = [];
        }
        if (is_array($content)) {
            return $this->o_content = $content;
        }
        if ($content instanceof self) {
            return $this->o_content = $content->o_content;
        }
        if (is_object($content)) {
            // Converts to associative array, only public properties of input object
            return $this->o_content = json_decode(json_encode($content), true);
        }
        throw new \InvalidArgumentException('Unsupported input data for O\Arr');
    }
}
