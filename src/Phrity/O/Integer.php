<?php
/**
 * File for O\Integer class.
 * @package Phrity > O
 */
namespace Phrity\O;

/**
 * O\Integer class.
 */
class Integer
{
    /**
     * Internal data structure
     */
    protected $o_content;

    /**
     * Constructor for O\Integer
     * @param mixed $args Input data
     */
    public function __construct(...$args)
    {
        // Allow subclass to use additional input
        $content = array_shift($args);
        $this->bind($content);

        if (!empty($args)) {
            throw new \InvalidArgumentException('Unsupported argument for O\Integer');
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
        if (is_int($content)) {
            return $this->o_content = $content;
        }
        if (is_null($content)) {
            return $this->o_content = 0;
        }
        if (is_numeric($content)) {
            $int_content = (int)$content;
            if ($int_content == $content) {
                return $this->o_content = $int_content;
            }
        }
        if ($content instanceof self) {
            return $this->o_content = $content->o_content;
        }
        throw new \InvalidArgumentException('Unsupported input data for O\Integer');
    }
}