# Array traits

The following traits are available for array source type.

| Trait | Implements | Example |
| --- | --- | --- |
| ArrayAccessTrait | [ArrayAccess](https://www.php.net/manual/en/class.arrayaccess.php) | `$value = $class[1]` |
| ComparableTrait | [Comparable](https://github.com/sirn-se/phrity-comparison), [Equalable](https://github.com/sirn-se/phrity-comparison) |  `$class->compare($other_class)` |
| CountableTrait | [Countable](https://www.php.net/manual/en/class.countable.php) |  `count($class)` |
| IteratorAggregateTrait | [IteratorAggregate](https://www.php.net/manual/en/class.iteratoraggregate), [Traversable](https://www.php.net/manual/en/class.traversable.php) |  `foreach ($class as $key => $val)` |
| IteratorTrait | [Iterator](https://www.php.net/manual/en/class.iterator.php), [Traversable](https://www.php.net/manual/en/class.traversable.php) |  `foreach ($class as $key => $val)` |
| QueueIteratorTrait | [IteratorAggregate](https://www.php.net/manual/en/class.iteratoraggregate), [Traversable](https://www.php.net/manual/en/class.traversable.php) |  `foreach ($class as $key => $val)` |
| StackIteratorTrait | [IteratorAggregate](https://www.php.net/manual/en/class.iteratoraggregate), [Traversable](https://www.php.net/manual/en/class.traversable.php) |  `foreach ($class as $key => $val)` |
| StringableTrait | [Stringable](https://www.php.net/manual/en/class.stringable) | `echo $class` |


## Defining data source

By default, source data is stored in protected property `$o_array_source`.

If your class is using another property to keep array data, it may define the source property by setting
`$o_source_ref` to the name of that property. All array traits use this definition;

```php
protected array $o_array_source = [];
protected string $o_source_ref = 'o_array_source';
```

## Traits

### ArrayAccessTrait

Trait that implements the [ArrayAccess](https://www.php.net/manual/en/class.arrayaccess.php) interface.
Allows accessing class as if it were an array.

#### Synopsis
```php
trait Phrity\O\Array\ArrayAccessTrait
{
    public function offsetExists(mixed $offset): bool;
    public function offsetGet(mixed $offset): mixed;
    public function offsetSet(mixed $offset, mixed $value): void;
    public function offsetUnset(mixed $offset): void;
}
```

#### Usage
```php
class MyClass implements ArrayAccessTrait
{
    use Phrity\O\Array\ArrayAccessTrait;
}

$class = new MyClass(['a' => 1, 'b' => 2, 'c' => 3]);
isset($class['a']); // => true
unset($class['c']);
$class['b']; // => 2
$class['d'] = 4;
$class[] = 5;
```

### ComparableTrait

Trait that implements the [Comparable](https://github.com/sirn-se/phrity-comparison) and
[Equalable](https://github.com/sirn-se/phrity-comparison) interfaces.

#### Synopsis
```php
trait Phrity\O\Array\ComparableTrait
{
     public function compare(mixed $compare_with): int;
}
```

#### Usage
```php
class MyClass implements Phrity\Comparison\Comparable, Phrity\Comparison\Equalable
{
    use Phrity\O\Array\ComparableTrait;
}

$class_a = new MyClass(['a' => 1, 'b' => 2, 'c' => 3]);
$class_b = new MyClass(['a' => 4, 'b' => 5, 'c' => 8]);
$class_a->equals($class_b);
$class_a->greaterThan($class_b);
$class_a->greaterThanOrEqual($class_b);
$class_a->lessThan($class_b);
$class_a->lessThanOrEqual($class_b);
$class_a->compare($class_b);
```

### CountableTrait

Trait that implements the [Countable](https://www.php.net/manual/en/class.countable.php) interface.
Enables `count()` function on class.

#### Synopsis
```php
trait Phrity\O\Array\CountableTrait
{
     public function count(): int;
}
```

#### Usage
```php
class MyClass implements Countable
{
    use Phrity\O\Array\CountableTrait;
}

$class = new MyClass(['a' => 1, 'b' => 2, 'c' => 3]);
count($class); // => 3
```

### IteratorAggregateTrait

Trait that implements the [IteratorAggregate](https://www.php.net/manual/en/class.iteratoraggregate) and
[Traversable](https://www.php.net/manual/en/class.traversable.php) interfaces.
Enables traversing methods such as `foreach()` by aggregating a [Generator](https://www.php.net/manual/en/class.generator).

#### Synopsis
```php
trait Phrity\O\Array\IteratorAggregateTrait
{
     public getIterator(): Traversable
}
```

#### Usage
```php
class MyClass implements IteratorAggregate, Traversable
{
    use Phrity\O\Array\IteratorAggregateTrait;
}

$class = new MyClass(['a' => 1, 'b' => 2, 'c' => 3]);
foreach ($class as $key => $val) {
    // ...
}
```

### IteratorTrait

Trait that implements the [Iterator](https://www.php.net/manual/en/class.iterator.php) and
[Traversable](https://www.php.net/manual/en/class.traversable.php) interfaces.
Enables traversing methods such as `foreach()`;

#### Synopsis
```php
trait Phrity\O\Array\IteratorTrait
{
     public function current(): mixed;
     public function key(): mixed;
     public function next(): void;
     public function rewind(): void;
     public function valid(): bool;
     public function previous(): mixed;
     public function forward(): mixed;
}
```

#### Usage
```php
class MyClass implements Iterator, Traversable
{
    use Phrity\O\Array\IteratorTrait;
}

$class = new MyClass(['a' => 1, 'b' => 2, 'c' => 3]);
foreach ($class as $key => $val) {
    // ...
}
```

### QueueIteratorTrait

Same as IteratorAggregateTrait, except it will **consume** array content.
As a Queue (FIFO) iterator, it will consume from the start of the array and forward.

#### Synopsis
```php
trait Phrity\O\Array\QueueIteratorTrait
{
    public getIterator(): Traversable
}
```

#### Usage
```php
class MyClass implements IteratorAggregate, Traversable
{
    use Phrity\O\Array\QueueIteratorTrait;
}

$class = new MyClass(['a' => 1, 'b' => 2, 'c' => 3]);
foreach ($class as $key => $val) {
    // ... consumes the array content
}
// $class is now empty
```

### StackIteratorTrait

Same as IteratorAggregateTrait, except it will **consume** array content.
As a Stack (LIFO) iterator, it will consume from the end of the array and backwards.

#### Synopsis
```php
trait Phrity\O\Array\StackIteratorTrait
{
    public getIterator(): Traversable
}
```

#### Usage
```php
class MyClass implements IteratorAggregate, Traversable
{
    use Phrity\O\Array\StackIteratorTrait;
}

$class = new MyClass(['a' => 1, 'b' => 2, 'c' => 3]);
foreach ($class as $key => $val) {
    // ... consumes the array content
}
// $class is now empty
```

### StringableTrait

Trait that implements the [Stringable](https://www.php.net/manual/en/class.stringable) interface.
Allows string conversion to `classname(count)` (namespaces are excluded).

#### Synopsis
```php
trait Phrity\O\Array\StringableTrait
{
     public function __toString(): string;
}
```

#### Usage
```php
class MyClass implements Stringable
{
    use Phrity\O\Array\StringableTrait;
}

$class = new MyClass(['a' => 1, 'b' => 2, 'c' => 3]);
echo $class; // => "MyClass(3)"
```