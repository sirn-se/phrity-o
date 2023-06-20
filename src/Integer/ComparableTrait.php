<?php

namespace Phrity\O\Integer;

use Phrity\Comparison\{
    ComparisonTrait,
    IncomparableException
};

/**
 * Phrity\O\Integer\ComparableTrait trait.
 */
trait ComparableTrait
{
    use ComparisonTrait;
    use TypeTrait;

    // Comparable interface implementation.

    /**
     * Compare $this with provided instance of the same class.
     * @param  mixed $compare_with The instance to compare with.
     * @return int -1, 0 or +1 comparison result.
     * @throws IncomparableException If provided input is not comparable.
     */
    public function compare(mixed $compare_with): int
    {
        if (!$compare_with instanceof self) {
            $class = self::class;
            throw new IncomparableException("Can only compare {$class}.");
        }
        if ($this->{$this->o_source_ref} == $compare_with->{$compare_with->o_source_ref}) {
            return 0;
        }
        return $this->{$this->o_source_ref} > $compare_with->{$compare_with->o_source_ref} ? +1 : -1;
    }
}
