# ”O” > Integer

[Arr](class.arr.md) | [Obj](class.obj.md) | [Str](class.str.md) | Integer | [Number](class.number.md) | [Boolean](class.boolean.md)

## The Integer class

An object implementation of `int`.

### Implements

* [Comparable](https://github.com/sirn-se/phrity-comparison)
* [Equalable](https://github.com/sirn-se/phrity-comparison)


###  Class synopsis

```php
class Phrity\O\Integer
    implements Phrity\Comparison\Comparable {

    /* Methods */
    public __construct(mixed ...$args)
    public __invoke(mixed $offset) : int
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
$int = new O\Integer(); // Empty is zero
$int = new O\Integer(1234); // Integer input
$int = new O\Integer('1234'); // Numeric string input
$int = new O\Integer(new O\Integer(1234); // Cloning

// Get and set
$int = new O\Integer(1234);
$int(); // Get 1234
$int(5678); // Set 5678
```
