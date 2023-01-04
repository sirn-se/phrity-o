# [Array](../Array.md) / StackIteratorTrait

Same as IteratorAggregateTrait, except it will **consume** array content.
As a Stack (LIFO) iterator, it will consume from the end of the array and backwards.

## Trait synopsis

```php
trait StackIteratorTrait
{
    use TypeTrait;

    // IteratorAggregate interface implementation.

    /**
     * Consume array and yield key/value pair.
     * @return Generator The iterator function.
     */
    public function getIterator(): Generator;
}
```

## Examples

```php

use Phrity\O\Array\StackIteratorTrait;

class MyClass implements IteratorAggregate, Traversable
{
    use StackIteratorTrait;

    public function __construct(array $input)
    {
        $this->initialize($input);
    }
}

$class = new MyClass(['a' => 1, 'b' => 2, 'c' => 3]);
foreach ($class as $key => $val) {
    // ... consumes the array content
}
// $class is now empty
```
