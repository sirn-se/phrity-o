<?php

/**
 * File for O\Stack class.
 * @package Phrity > O
 */

namespace Phrity\O;

/**
 * O\Stack class.
 */
class Stack implements \Countable, \IteratorAggregate, \Phrity\Comparison\Comparable, \Stringable
{
    use \Phrity\Comparison\ComparisonTrait;

    /**
     * Internal data structure
     */
    protected $o_content;

    /**
     * Constructor for O\Stack
     * @param mixed $args Input data
     */
    public function __construct(mixed ...$args)
    {
        // Allow subclass to use additional input
        $content = array_shift($args);
        $this->bind($content);

        if (!empty($args)) {
            throw new \InvalidArgumentException('Unsupported argument for O\Stack');
        }
    }

    /**
     * Add item to the queue
     */
    public function push(mixed $item): void
    {
        array_unshift($this->o_content, $item);
    }

    /**
     * Get item from the queue
     */
    public function pop(): mixed
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


    // IteratorAggregate interface implementation

    /**
     * Consume and return the current key/value pair
     * @return mixed Current element
     */
    public function getIterator(): \Traversable
    {
        return (function () {
            while (!empty($this->o_content)) {
                $key = key($this->o_content);
                $val = $this->pop();
                yield $key => $val;
            }
        })();
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
    public function compare(mixed $compare_with): int
    {
        if (!$compare_with instanceof self) {
            throw new \Phrity\Comparison\IncomparableException('Can only compare O\Stack');
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
            return $this->o_content = array_reverse($content);
        }
        if ($content instanceof self) {
            return $this->o_content = array_reverse($content->o_content);
        }
        throw new \InvalidArgumentException('Unsupported input data for O\Stack');
    }
}
