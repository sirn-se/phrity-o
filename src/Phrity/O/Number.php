<?php
/**
 * File for O\Number class.
 * @package Phrity > O
 */
namespace Phrity\O;

/**
 * O\Number class.
 */
class Number
{
    /**
     * Internal data structure
     */
    protected $o_content;

    /**
     * Constructor for O\Number
     * @param mixed $args Input data
     */
    public function __construct(...$args)
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
