# O / Number

[Arr](class.arr.md) | [Obj](class.obj.md) | [Str](class.str.md) | [Integer](class.integer.md) | Number | [Boolean](class.boolean.md)

## The Number class

An object implementation of `float`.

### Implements

* [Comparable](https://github.com/sirn-se/phrity-comparison)
* [Equalable](https://github.com/sirn-se/phrity-comparison)

###  Class synopsis

```php
class Phrity\O\Number {

    /* Methods */
    public __construct(mixed ...$args)
    public __invoke(mixed $offset) : float
    public __toString() : string
}
```

###  Examples

```php
// Constructor variants
$num = new O\Number(); // Empty is zero
$num = new O\Number(12.34); // Float input
$num = new O\Number('12.34'); // Numeric string input
$num = new O\Number(new O\Number(12.34); // Cloning

// Get and set
$num = new O\Number(12.34);
$num(); // Get 12.34
$num(56.78); // Set 56.78
```
