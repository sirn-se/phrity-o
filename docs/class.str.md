# ”O” > Str

[Arr](class.arr.md) | [Obj](class.obj.md) | Str | [Integer](class.integer.md) | [Number](class.number.md) | [Boolean](class.boolean.md)

## The Str class

An object implementation of `string`.

### Implements

* [Comparable](https://github.com/sirn-se/phrity-comparison)
* [Equalable](https://github.com/sirn-se/phrity-comparison)

###  Class synopsis

```php
class Phrity\O\Str
    implements Phrity\Comparison\Comparable {

    /* Methods */
    public __construct(mixed ...$args)
    public __invoke(mixed $offset) : string
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
$str = new O\Str(); // Empty string
$str = new O\Str('hello world'); // String input
$str = new O\Str(new O\Str('hello world'); // Cloning

// Get and set
$str = new O\Str('hello');
$str(); // Get 'hello'
$str('world'); // Set 'world'
```