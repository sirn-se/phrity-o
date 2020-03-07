<?php

/**
 * File for O\Queue class.
 * @package Phrity > O
 */

namespace Phrity\O;

/**
 * O\Queue class.
 */
class Queue implements \Countable, \Iterator, \Phrity\Comparison\Comparable
{
    use \Phrity\Comparison\ComparisonTrait;

    /**
     * Internal data structure
     */
    protected $o_content;

    /**
     * Constructor for O\Queue
     * @param mixed $args Input data
     */
    public function __construct(...$args)
    {
        // Allow subclass to use additional input
        $content = array_shift($args);
        $this->bind($content);

        if (!empty($args)) {
            throw new \InvalidArgumentException('Unsupported argument for O\Queue');
        }
    }

    /**
     * Add item to the queue
     */
    public function enqueue($item)
    {
        $this->o_content[] = $item;
    }

    /**
     * Get item from the queue
     */
    public function dequeue()
    {
        return array_shift($this->o_content);
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
     * Consume and return the current element
     * @return mixed Current element
     */
    public function current()
    {
        return array_shift($this->o_content);
    }

    /**
     * Return the key of the current element
     * @return scalar|null Current key
     */
    public function key()
    {
        return key($this->o_content);
    }

    /**
     * Not applicable
     */
    public function next()
    {
        return;
    }

    /**
     * Rewind the Iterator to the first element
     */
    public function rewind()
    {
        reset($this->o_content);
    }

    /**
     * Checks if current position is valid
     * @return bool True if valid
     */
    public function valid(): bool
    {
        return !empty($this->o_content);
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
     * @param  Queue $compare_with The object to compare with
     * @return int                 -1, 0 or +1 comparison result
     */
    public function compare($compare_with): int
    {
        if (!$compare_with instanceof self) {
            throw new \Phrity\Comparison\IncomparableException('Can only compare O\Queue');
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
    protected function bind($content)
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
        throw new \InvalidArgumentException('Unsupported input data for O\Queue');
    }
}
