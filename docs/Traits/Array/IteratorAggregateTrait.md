# Array > IteratorAggregateTrait

Trait that implements the [IteratorAggregate](https://www.php.net/manual/en/class.iteratoraggregate) and
[Traversable](https://www.php.net/manual/en/class.traversable.php) interfaces.
Enables traversing methods such as `foreach()` by aggregating a [Generator](https://www.php.net/manual/en/class.generator).

#### Trait synopsis

```php
trait IteratorAggregateTrait
{
     // IteratorAggregate interface methods

     public getIterator(): Traversable;
}
```

#### Usage

```php
class MyClass implements IteratorAggregate, Traversable
{
    use IteratorAggregateTrait;
}
```

#### Examples

```php
$class = new MyClass(['a' => 1, 'b' => 2, 'c' => 3]);
foreach ($class as $key => $val) {
    // ...
}
```
