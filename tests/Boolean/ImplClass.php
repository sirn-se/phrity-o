<?php

declare(strict_types=1);

namespace Phrity\O\Test\Boolean;

use Phrity\O\Boolean\{
    CoercionTrait,
    ComparableTrait,
    InvokableTrait,
    StringableTrait,
    TypeTrait
};

/**
 * Trait-using class for Phrity\O\Boolean\* tests.
 */
class ImplClass
{
    use CoercionTrait;
    use ComparableTrait;
    use InvokableTrait;
    use StringableTrait;
    use TypeTrait;

    /**
     * Constructor for test class.
     * @oparam bool $data Initial value.
     * @oparam bool $coerce Coercion mode.
     */
    public function __construct(bool $data, bool $coerce = false)
    {
        $this->o_option_coerce = $coerce;
        $this->initialize($data);
    }

    /**
     * Method used for coercion tests.
     * @oparam mixed $content Value to coerce.
     * @return bool Coerced value.
     */
    public function testCoercion(mixed $content): bool
    {
        return $this->coerce($content);
    }
}
