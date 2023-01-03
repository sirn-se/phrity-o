<?php

declare(strict_types=1);

namespace Phrity\O\Test\Array;

use IteratorAggregate;
use Phrity\O\Array\{
    QueueIteratorTrait,
    TypeTrait
};

/**
 * Trait-using class for Phrity\O\Array\* tests.
 */
class ImplQueueClass implements IteratorAggregate
{
    use QueueIteratorTrait;
    use TypeTrait;

    /**
     * Constructor for test class.
     * @oparam array $data Initial value.
     * @oparam bool $coerce Coercion mode.
     */
    public function __construct(array $data, bool $coerce = false)
    {
        $this->o_option_coerce = $coerce;
        $this->initialize($data);
    }
}
