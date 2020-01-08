# ”O” > Boolean

[Arr](class.arr.md) | [Obj](class.obj.md) | [Str](class.str.md) | [Integer](class.integer.md) | [Number](class.number.md) | Boolean

## The Boolean class

An object implementation of `bool`.

###  Class synopsis

```php
class Phrity\O\Boolean {

    /* Methods */
    public __construct(mixed ...$args)
    public __invoke(mixed $offset) : bool
    public __toString() : string
}
```

###  Examples

```php
// Constructor variants
$bool = new O\Boolean(); // Empty is false
$bool = new O\Boolean(true); // Bool input
$bool = new O\Boolean('1'); // Numeric string input
$bool = new O\Boolean(new O\Boolean(true); // Cloning

// Get and set
$bool = new O\Boolean(true);
$bool(); // Get true
$bool(false); // Set false
```

