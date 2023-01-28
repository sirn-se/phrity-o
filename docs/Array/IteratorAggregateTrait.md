# [Docs](../../README.md) / [Array](../Array.md) / IteratorAggregateTrait

Trait that implements the [IteratorAggregate](https://www.php.net/manual/en/class.iteratoraggregate) and
[Traversable](https://www.php.net/manual/en/class.traversable.php) interfaces.
Enables traversing methods such as `foreach()` by aggregating a [Generator](https://www.php.net/manual/en/class.generator).

## Trait synopsis

```php
trait IteratorAggregateTrait
{
    use TypeTrait;

    // IteratorAggregate interface implementation.

    /**
     * Iterate array and yield key/value pair.
     * @return Generator The iterator function.
     */
    public function getIterator(): Generator;
}
```

## Examples

```php

use Phrity\O\Array\IteratorAggregateTrait;

class MyClass implements IteratorAggregate, Traversable
{
    use IteratorAggregateTrait;

    public function __construct(array $input)
    {
        $this->initialize($input);
    }
}

$class = new MyClass(['a' => 1, 'b' => 2, 'c' => 3]);
foreach ($class as $key => $val) {
    // ...
}
```
