<?php

declare(strict_types=1);

namespace Phrity\O\Test\Object;

/**
 * Test class for Phrity\O\Object\* tests.
 */
class ImportClass
{
    public int $a = 1;
    protected int $b = 2;
    /** @phpstan-ignore property.onlyWritten */
    private int $c = 3;
}
