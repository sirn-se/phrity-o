<?php
/**
 * File for O\Boolean class.
 * @package Phrity > O
 */
namespace Phrity\O;

/**
 * O\Boolean class.
 */
class Boolean
{
    /**
     * Internal data structure
     */
    protected $o_content;

    /**
     * Constructor for O\Boolean
     * @param mixed $args Input data
     */
    public function __construct(...$args)
    {
        // Allow subclass to use additional input
        $content = array_shift($args);
        $this->bind($content);

        if (!empty($args)) {
            throw new \InvalidArgumentException('Unsupported argument for O\Boolean');
        }
    }

    /**
     * Getter/setter implementation
     * @param  mixed $args Input data
     * @return string      Current value
     */
    public function __invoke(...$args)
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
    public function __toString()
    {
        return (string)$this();
    }


    // Protected internal methods

    /**
     * Bind provided data to internal structure
     * @param  mixed $content Input data
     * @return array          The internal structure
     */
    protected function bind($content)
    {
        if (is_bool($content)) {
            return $this->o_content = $content;
        }
        if ($content instanceof self) {
            return $this->o_content = $content->o_content;
        }
        if (is_scalar($content) || is_null($content)) {
            return $this->o_content = $content == 1;
        }
        throw new \InvalidArgumentException('Unsupported input data for O\Boolean');
    }
}
