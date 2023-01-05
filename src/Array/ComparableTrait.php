<?php

namespace Phrity\O\Array;

use Phrity\Comparison\{
    ComparisonTrait,
    IncomparableException
};

/**
 * Phrity\O\Array\ComparableTrait trait.
 */
trait ComparableTrait
{
    use ComparisonTrait;
    use TypeTrait;

    /**
     * Compare $this with provided instance of the same class.
     * @param  mixed $compare_with The instance to compare with.
     * @return int -1, 0 or +1 comparison result.
     */
    public function compare(mixed $compare_with): int
    {
        if (!$compare_with instanceof self) {
            $class = self::class;
            throw new IncomparableException("Can only compare {$class}");
        }
        if ($this->{$this->o_source_ref} == $compare_with->{$this->o_source_ref}) {
            return 0;
        }
        return $this->{$this->o_source_ref} > $compare_with->{$this->o_source_ref} ? +1 : -1;
    }
}
