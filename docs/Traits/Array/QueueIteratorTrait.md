# Array > QueueIteratorTrait

Same as IteratorAggregateTrait, except it will **consume** array content.
As a Queue (FIFO) iterator, it will consume from the start of the array and forward.

#### Trait synopsis

```php
trait QueueIteratorTrait
{
     // IteratorAggregate interface methods

     public getIterator(): Traversable;
}
```

#### Usage

```php
class MyClass implements IteratorAggregate, Traversable
{
    use QueueIteratorTrait;
}
```

#### Examples

```php
$class = new MyClass(['a' => 1, 'b' => 2, 'c' => 3]);
foreach ($class as $key => $val) {
    // ... consumes the array content
}
// $class is now empty
```
