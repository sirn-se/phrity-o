# O / Obj

[Arr](class.arr.md) | Obj | [Str](class.str.md) | [Integer](class.integer.md) | [Number](class.number.md) | [Boolean](class.boolean.md)

## The Obj class

An object implementation of `object`.

### Implements

* [Comparable](https://github.com/sirn-se/phrity-comparison)
* [Equalable](https://github.com/sirn-se/phrity-comparison)

###  Class synopsis

```php
class Phrity\O\Obj
    implements Phrity\Comparison\Comparable {

    /* Methods */
    public __construct(mixed ...$args)
    public __get(string $key)
    public __set(string $key, mixed $value)
    public __isset(string $key)
    public __unset(string $key)
    public __toString() : string

    /* Phrity\Comparison\Comparable interface implementation */
    public compare(mixed $compare_with) : int
    public equals(mixed $compare_with) : bool
    public greaterThan(mixed $compare_with) : bool
    public greaterThanOrEqual(mixed $compare_with) : bool
    public lessThan(mixed $compare_with) : bool
    public lessThanOrEqual(mixed $compare_with) : bool
}
```

###  Examples

```php
// Constructor variants
$object = new O\Obj(); // Empty object
$object = new O\Obj(['a' => 1, 'b' => 2, 'c' => 3]); // Object from array
$object = new O\Obj($myclass); // Public properties to object
$object = new O\Obj(new O\Obj(['a' => 1, 'b' => 2, 'c' => 3]); // Cloning

// Property access
$object = new O\Obj(['a' => 1, 'b' => 2]);
$object->a; // 1
$object->b = 5;

// Comparison support
$object = new O\Obj(['a' => 1, 'b' => 2]);
$object->lessThan(new O\Obj(['a' => 2, 'b' => 3])); // true
$object->equals(new O\Obj(['c' => 1, 'd' => 2])); // false
```
