# ”O” > Arr

Arr | [Obj](class.obj.md) | [Str](class.str.md) | [Integer](class.integer.md) | [Number](class.number.md) | [Boolean](class.boolean.md)

## The Arr class

An object implementation of `array`.

### Implements

* [ArrayAccess](https://www.php.net/manual/en/class.arrayaccess.php)
* [Countable](https://www.php.net/manual/en/class.countable.php)
* [Iterator](https://www.php.net/manual/en/class.iterator.php)
* [Traversable](https://www.php.net/manual/en/class.traversable.php)
* [Comparable](https://github.com/sirn-se/phrity-comparison)
* [Equalable](https://github.com/sirn-se/phrity-comparison)

###  Class synopsis

```php
class Phrity\O\Arr implements ArrayAccess, Countable, Iterator, Phrity\Comparison\Comparable {

    /* Methods */
    public __construct(mixed ...$args)
    public previous() : void
    public forward() : void
    public __toString() : string

    /* ArrayAccess interface implementation */
    public offsetExists(mixed $offset) : bool
    public offsetGet(mixed $offset) : mixed
    public offsetSet(mixed $offset, mixed $value) : void
    public offsetUnset(mixed $offset) : void

    /* Countable interface implementation */
    public count() : int

    /* Iterator interface implementation */
    public current() : mixed
    public key() : scalar
    public next() : void
    public rewind() : void
    public valid() : bool

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
$array = new O\Arr(); // Empty array
$array = new O\Arr([1, 2, 3]); // Numeric array
$array = new O\Arr(['a' => 1, 'b' => 2, 'c' => 3]); // Associative array
$array = new O\Arr($myclass); // Public properties to associative array
$array = new O\Arr(new O\Arr([1, 2, 3]); // Cloning

// ArrayAccess support
$array = new O\Arr([1, 2, 3]);
$array[] = 7; // [1, 2, 3, 7]
$array[0] = 5; // [5, 2, 3, 7]

// Countable support
$array = new O\Arr([1, 2, 3]);
count($array) // 3

// Iterator support
$array = new O\Arr([1, 2, 3]);
foreach ($array as $key => $value) {}

// Comparison support
$array = new O\Arr([1, 2, 3]);
$array->lessThan(new O\Arr([1, 2, 3, 4])); // true
$array->equals(new O\Arr([2, 3, 4])); // false
```
