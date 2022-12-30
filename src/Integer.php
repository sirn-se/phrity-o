<?php

/**
 * File for Phrity\O\Integer class.
 * @package Phrity > O.
 */

namespace Phrity\O;

use ArgumentCountError;
use Phrity\Comparison\Comparable;
use Phrity\O\Integer\{
    CoercionTrait,
    ComparableTrait,
    InvokableTrait,
    StringableTrait,
    TypeTrait
};
use Stringable;

/**
 * Phrity\O\Integer class.
 */
class Integer implements Comparable, Stringable
{
    use CoercionTrait;
    use ComparableTrait;
    use InvokableTrait;
    use StringableTrait;
    use TypeTrait;

    /**
     * Constructor for Phrity\O\Integer.
     * @param mixed ...$args Input data.
     * @throws ArgumentCountError If non-expected arguments provided.
     */
    public function __construct(mixed ...$args)
    {
        // Setup - use coersion.
        $this->o_option_coerce = true;

        // Allow subclass to use additional input.
        $content = array_shift($args);
        $this->initialize($this->coerce($content));

        if (!empty($args)) {
            $class = self::class;
            throw new ArgumentCountError("Unsupported argument for {$class}.");
        }
    }
}
