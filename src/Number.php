<?php

/**
 * File for O\Number class.
 * @package Phrity > O
 */

namespace Phrity\O;

/**
 * O\Number class.
 */
class Number implements \Phrity\Comparison\Comparable, \Stringable
{
    use \Phrity\Comparison\ComparisonTrait;

    /**
     * Internal data structure
     */
    protected $o_content;

    /**
     * Constructor for O\Number
     * @param mixed $args Input data
     */
    public function __construct(mixed ...$args)
    {
        // Allow subclass to use additional input
        $content = array_shift($args);
        $this->bind($content);

        if (!empty($args)) {
            throw new \InvalidArgumentException('Unsupported argument for O\Number');
        }
    }

    /**
     * Getter/setter implementation
     * @param  mixed $args Input data
     * @return float       Current value
     */
    public function __invoke(mixed ...$args): float
    {
        // Get call
        if (empty($args)) {
            return $this->o_content;
        }
        // Set call
        return $this->bind($args[0]);
    }


    // String representation methods

    /**
     * Return string representation
     * @return string
     */
    public function __toString(): string
    {
        return (string)$this();
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
            throw new \Phrity\Comparison\IncomparableException('Can only compare O\Number');
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
     * @return float          The internal structure
     */
    protected function bind(mixed $content): float
    {
        if (is_numeric($content)) {
            return $this->o_content = (float)$content;
        }
        if (is_null($content)) {
            return $this->o_content = 0.0;
        }
        if ($content instanceof self) {
            return $this->o_content = $content->o_content;
        }
        throw new \InvalidArgumentException('Unsupported input data for O\Number');
    }
}
