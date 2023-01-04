# [Array](../Array.md) / QueueIteratorTrait

Same as IteratorAggregateTrait, except it will **consume** array content.
As a Queue (FIFO) iterator, it will consume from the start of the array and forward.

## Trait synopsis

```php
trait QueueIteratorTrait
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

use Phrity\O\Array\QueueIteratorTrait;

class MyClass implements IteratorAggregate, Traversable
{
    use QueueIteratorTrait;

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
