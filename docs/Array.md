# Array traits

The following traits are available for array source type.

| Trait | Implements |
| --- | --- |
| ArrayAccessTrait | [ArrayAccess](https://www.php.net/manual/en/class.arrayaccess.php) |
| ComparableTrait | [Comparable](https://github.com/sirn-se/phrity-comparison) [Equalable](https://github.com/sirn-se/phrity-comparison) |
| CountableTrait | [Countable](https://www.php.net/manual/en/class.countable.php) |
| IteratorTrait | [Iterator](https://www.php.net/manual/en/class.iterator.php) [Traversable](https://www.php.net/manual/en/class.traversable.php) |
| StringableTrait | [Stringable](https://www.php.net/manual/en/class.stringable) |

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

#### Synopsis
```php
trait Phrity\O\Array\ArrayAccessTrait {
    public function offsetExists(mixed $offset): bool;
    public function offsetGet(mixed $offset): mixed;
    public function offsetSet(mixed $offset, mixed $value): void;
    public function offsetUnset(mixed $offset): void
}
```

#### Usage
```php
class MyClass implements ArrayAccessTrait {
    use Phrity\O\Array\ArrayAccessTrait;
}
```

### ComparableTrait

Trait that provides `compare()` method, that may implement the [Comparable](https://github.com/sirn-se/phrity-comparison) and
[Equalable](https://github.com/sirn-se/phrity-comparison) interfaces.

#### Synopsis
```php
trait Phrity\O\Array\ComparableTrait {
     public function compare(mixed $compare_with): int
}
```

#### Usage
```php
class MyClass implements Phrity\Comparison\Comparable, Phrity\Comparison\Equalable {
    use Phrity\O\Array\ComparableTrait;
    use Phrity\Comparison\ComparisonTrait;
}
```

### CountableTrait

Trait that implements the [Countable](https://www.php.net/manual/en/class.countable.php) interface.

#### Synopsis
```php
trait Phrity\O\Array\CountableTrait {
     public function count(): int;
}
```

#### Usage
```php
class MyClass implements Countable {
    use Phrity\O\Array\CountableTrait;
}
```

### IteratorTrait

Trait that implements the [Iterator](https://www.php.net/manual/en/class.iterator.php) and
[Traversable](https://www.php.net/manual/en/class.traversable.php) interfaces.

#### Synopsis
```php
trait Phrity\O\Array\IteratorTrait {
     public function current(): mixed;
     public function key(): mixed;
     public function next(): void;
     public function rewind(): void;
     public function valid(): bool;
     public function previous(): mixed;
     public function forward(): mixed
}
```

#### Usage
```php
class MyClass implements Iterator, Traversable {
    use Phrity\O\Array\IteratorTrait;
}
```

### StringableTrait

Trait that implements the [Stringable](https://www.php.net/manual/en/class.stringable) interface.

#### Synopsis
```php
trait Phrity\O\Array\StringableTrait {
     public function __toString(): string;
}
```

#### Usage
```php
class MyClass implements Stringable {
    use Phrity\O\Array\StringableTrait;
}
```