<?php

/**
 * File for O\Obj class.
 * @package Phrity > O.
 */

namespace Phrity\O;

use InvalidArgumentException;
use Stringable;
use Phrity\Comparison\Comparable;
use Phrity\O\Object\{
    ComparableTrait,
    PropertyAccessTrait,
    StringableTrait
};

/**
 * O\Obj class.
 */
class Obj implements Comparable, Stringable
{
    use ComparableTrait;
    use PropertyAccessTrait;
    use StringableTrait;

    /**
     * Constructor for O\Obj
     * @param mixed $args Input data
     */
    public function __construct(mixed ...$args)
    {
        $this->{$this->o_source_ref} = new \stdclass();

        // Allow subclass to use additional input
        $content = array_shift($args);
        $this->bind($content);

        if (!empty($args)) {
            throw new \InvalidArgumentException('Unsupported argument for O\Obj');
        }
    }


    // Protected internal methods

    /**
     * Bind provided data to internal structure
     * @param  mixed $content Input data
     * @return object         The internal structure
     */
    protected function bind(mixed $content): object
    {
        if (is_null($content)) {
            return $this->{$this->o_source_ref} = new \stdclass();
        }
        if ($content instanceof self) {
            return $this->{$this->o_source_ref} = $content->{$this->o_source_ref};
        }
        if ($content instanceof \stdclass) {
            return $this->{$this->o_source_ref} = $content;
        }
        if (is_object($content) || is_array($content)) {
            // Converts to stdclass, only public properties if input is object
            return $this->{$this->o_source_ref} = json_decode(json_encode($content, JSON_FORCE_OBJECT));
        }
        throw new InvalidArgumentException('Unsupported input data for O\Obj');
    }
}
