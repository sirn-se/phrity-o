# [Docs](../../README.md) / [Array](../Array.md) / StackTrait

Adds stack methods.
As a Stack (LIFO) implementation, `push` will put items at the top and `pop` will retrieve the last added item.


## Trait synopsis

```php
trait StackTrait
{
    use TypeTrait;

    /**
     * Add item to the top of stack.
     * @param mixed $item Item to add.
     */
    public function push(mixed $item): void;

    /**
     * Retrieve item from stack.
     * @return mixed $item Get and remove top item in stack.
     */
    public function pop(): mixed;
}
```

## Examples

```php

use Phrity\O\Array\StackTrait;

class MyClass
{
    use StackTrait;

    public function __construct()
    {
        $this->initialize();
    }
}

$class = new MyClass();
$class->push('A');
$class->push('B');
$class->push('C');
$class->pop(); // => "C"
$class->pop(); // => "B"
$class->pop(); // => "A"
$class->pop(); // => null
```
