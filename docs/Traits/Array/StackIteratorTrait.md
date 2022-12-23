# Array > StackIteratorTrait

Same as IteratorAggregateTrait, except it will **consume** array content.
As a Stack (LIFO) iterator, it will consume from the end of the array and backwards.

#### Trait synopsis

```php
trait StackIteratorTrait
{
     // IteratorAggregate interface methods

     public getIterator(): Traversable;
}
```

#### Usage

```php
class MyClass implements IteratorAggregate, Traversable
{
    use StackIteratorTrait;
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
