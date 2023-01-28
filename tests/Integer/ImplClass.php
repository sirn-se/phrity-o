<?php

declare(strict_types=1);

namespace Phrity\O\Test\Integer;

use Phrity\O\Integer\{
    CoercionTrait,
    ComparableTrait,
    InvokableTrait,
    StringableTrait,
    TypeTrait
};

/**
 * Trait-using class for Phrity\O\Integer\* tests.
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
     * @oparam int $data Initial value.
     * @oparam bool $coerce Coercion mode.
     */
    public function __construct(int $data, bool $coerce = false)
    {
        $this->o_option_coerce = $coerce;
        $this->initialize($data);
    }

    /**
     * Method used for coercion tests.
     * @oparam mixed $content Value to coerce.
     * @return int Coerced value.
     */
    public function testCoercion(mixed $content): int
    {
        return $this->coerce($content);
    }
}
