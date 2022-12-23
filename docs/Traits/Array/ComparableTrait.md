# Array > ComparableTrait

Trait that implements the [Comparable](https://github.com/sirn-se/phrity-comparison) and
[Equalable](https://github.com/sirn-se/phrity-comparison) interfaces.

#### Trait synopsis

```php
trait ComparableTrait
{
    // Comparable interface methods

    public function compare(mixed $compare_with): int;

    // Equalable interface methods (inherited)

    public equals(mixed $compare_with): bool;

    // Comparable interface methods (inherited)

    public greaterThan(mixed $compare_with) : bool
    public greaterThanOrEqual(mixed $compare_with) : bool
    public lessThan(mixed $compare_with) : bool
    public lessThanOrEqual(mixed $compare_with) : bool
    public compare(mixed $compare_with) : int
}
```


#### Usage

```php
class MyClass implements Comparable, Equalable
{
    use ComparableTrait;
}
```

#### Examples

```php
$class_a = new MyClass(['a' => 1, 'b' => 2, 'c' => 3]);
$class_b = new MyClass(['a' => 4, 'b' => 5, 'c' => 8]);
$class_a->equals($class_b);
$class_a->greaterThan($class_b);
$class_a->greaterThanOrEqual($class_b);
$class_a->lessThan($class_b);
$class_a->lessThanOrEqual($class_b);
$class_a->compare($class_b);
```
