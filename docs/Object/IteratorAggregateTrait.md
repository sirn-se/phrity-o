# [Docs](../../README.md) / [Object](../Object.md) / IteratorAggregateTrait

Trait that implements the [IteratorAggregate](https://www.php.net/manual/en/class.iteratoraggregate) and
[Traversable](https://www.php.net/manual/en/class.traversable.php) interfaces.
Enables traversing properties with methods such as `foreach()` by aggregating a [Generator](https://www.php.net/manual/en/class.generator).

## Trait synopsis

```php
trait IteratorAggregateTrait
{
    use TypeTrait;

    // IteratorAggregate interface implementation.

    /**
     * Iterate object properties and yield key/value pair.
     * @return Generator The iterator function.
     */
    public function getIterator(): Generator;
}
```

## Examples

```php

use Phrity\O\Object\IteratorAggregateTrait;

class MyClass implements IteratorAggregate, Traversable
{
    use IteratorAggregateTrait;

    public function __construct(object $input)
    {
        $this->initialize($input);
    }
}

$class = new MyClass((object)['a' => 1, 'b' => 2, 'c' => 3]);
foreach ($class as $key => $val) {
    // ...
}
```
