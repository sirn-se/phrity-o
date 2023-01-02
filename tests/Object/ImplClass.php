<?php

declare(strict_types=1);

namespace Phrity\O\Test\Object;

use Phrity\O\Object\{
    CoercionTrait,
    ComparableTrait,
    PropertyAccessTrait,
    StringableTrait,
    TypeTrait
};

/**
 * Trait-using class for Phrity\O\Object\* tests.
 */
class ImplClass
{
    use CoercionTrait;
    use ComparableTrait;
    use PropertyAccessTrait;
    use StringableTrait;
    use TypeTrait;

    /**
     * Constructor for test class.
     * @oparam object $data Initial value.
     * @oparam bool $coerce Coercion mode.
     */
    public function __construct(object $data, bool $coerce = false)
    {
        $this->o_option_coerce = $coerce;
        $this->initialize($data);
    }

    /**
     * Method used for coercion tests.
     * @oparam mixed $content Value to coerce.
     * @return object Coerced value.
     */
    public function testCoercion(mixed $content): object
    {
        return $this->coerce($content);
    }
}
