<?php
/**
 * File for O\Str class.
 * @package Phrity > O
 */
namespace Phrity\O;

/**
 * O\Str class.
 */
class Str
{
    /**
     * Internal data structure
     */
    protected $o_content;

    /**
     * Constructor for O\Str
     * @param mixed $args Input data
     */
    public function __construct(...$args)
    {
        // Allow subclass to use additional input
        $content = array_shift($args);
        $this->bind($content);

        if (!empty($args)) {
            throw new \InvalidArgumentException('Unsupported argument for O\Str');
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
        return $this();
    }


    // Protected internal methods

    /**
     * Bind provided data to internal structure
     * @param  mixed $content Input data
     * @return array          The internal structure
     */
    protected function bind($content)
    {
        if (is_scalar($content)) {
            return $this->o_content = (string)$content;
        }
        if (is_null($content)) {
            return $this->o_content = '';
        }
        if ($content instanceof self) {
            return $this->o_content = $content->o_content;
        }
        if (is_object($content) && method_exists($content, '__toString')) {
            return $this->o_content = "{$content}";
        }
        throw new \InvalidArgumentException('Unsupported input data for O\Str');
    }
}
