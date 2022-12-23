# Array > QueueTrait

Adds queue methods.
As a Queue (FIFO) implementation, `enqueue` will put items at the end and `dequeue` will retrieve the first item.


#### Trait synopsis

```php
trait QueueTrait
{
     // Queue methods

     public function enqueue(mixed $item): void;
     public function dequeue(): mixed;
}
```

#### Usage

```php
class MyClass
{
    use QueueTrait;
}
```

#### Examples

```php
$class = new MyClass();
$class->enqueue('A');
$class->enqueue('B');
$class->enqueue('C');
$class->dequeue(); // => "A"
$class->dequeue(); // => "B"
$class->dequeue(); // => "C"
$class->dequeue(); // => null
```
