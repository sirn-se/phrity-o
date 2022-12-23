# Array > IteratorTrait

Trait that implements the [Iterator](https://www.php.net/manual/en/class.iterator.php) and
[Traversable](https://www.php.net/manual/en/class.traversable.php) interfaces.
Enables traversing methods such as `foreach()`;

#### Trait synopsis

```php
trait IteratorTrait
{
     // Iterator interface methods

     public function current(): mixed;
     public function key(): mixed;
     public function next(): void;
     public function rewind(): void;
     public function valid(): bool;

     // Additional methods

     public function previous(): mixed;
     public function forward(): mixed;
}
```

#### Usage

```php
class MyClass implements Iterator, Traversable
{
    use IteratorTrait;
}
```

#### Examples

```php
$class = new MyClass(['a' => 1, 'b' => 2, 'c' => 3]);
foreach ($class as $key => $val) {
    // ...
}
```
