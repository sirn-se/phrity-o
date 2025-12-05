<?php

declare(strict_types=1);

namespace Phrity\O\Test\Number;

use Phrity\O\Number\{
    CoercionTrait,
    ComparableTrait,
    InvokableTrait,
    StringableTrait,
    TypeTrait
};

/**
 * Trait-using class for Phrity\O\Number\* tests.
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
     * @param float $data Initial value.
     * @param bool $coerce Coercion mode.
     */
    public function __construct(float $data, bool $coerce = false)
    {
        $this->o_option_coerce = $coerce;
        $this->initialize($data);
    }

    /**
     * Method used for coercion tests.
     * @param mixed $content Value to coerce.
     * @return float Coerced value.
     */
    public function testCoercion(mixed $content): float
    {
        return $this->coerce($content);
    }
}
