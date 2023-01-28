# [Docs](../../README.md) / [Array](../Array.md) / QueueTrait

Implements queue methods.
As a Queue (FIFO) implementation, `enqueue` will put items at the end and `dequeue` will retrieve the first item.

## Trait synopsis

```php
trait QueueTrait
{
    use TypeTrait;

    /**
     * Add item to the end of queue.
     * @param mixed $item Item to add.
     */
    public function enqueue(mixed $item): void;

    /**
     * Retrieve item from queue.
     * @return mixed $item Get and remove first item in queue.
     */
    public function dequeue(): mixed;
}
```

## Examples

```php

use Phrity\O\Array\QueueTrait;

class MyClass
{
    use QueueTrait;

    public function __construct()
    {
        $this->initialize();
    }
}

$class = new MyClass();
$class->enqueue('A');
$class->enqueue('B');
$class->enqueue('C');
$class->dequeue(); // => "A"
$class->dequeue(); // => "B"
$class->dequeue(); // => "C"
$class->dequeue(); // => null
```
