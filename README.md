[![Build Status](https://travis-ci.org/sirn-se/phrity-o.svg?branch=master)](https://travis-ci.org/sirn-se/phrity-o)
[![Coverage Status](https://coveralls.io/repos/github/sirn-se/phrity-o/badge.svg?branch=master)](https://coveralls.io/github/sirn-se/phrity-o?branch=master)

# ”O”

Consistent object representation of basic data types. Inheritance friendly implementation. Currently provides `Arr` (array), `Obj` (object), `Str` (string), `Number` (float), `Integer` (int) and `Boolean` (bool) classes.

## Installation

Install with [Composer](https://getcomposer.org/);
```
composer require phrity/o
```

## The Arr class

An object implementation of `array`. Implements `ArrayAccess`, `Countable` and `Iterator` interfaces.

###  Class synopsis

```php
class Phrity\O\Arr
    implements ArrayAccess, Countable, Iterator, Phrity\Comparison\Comparable {

    /* Methods */
    public __construct(mixed ...$args)
    public offsetExists(mixed $offset) : bool
    public offsetGet(mixed $offset) : mixed
    public offsetSet(mixed $offset, mixed $value) : void
    public offsetUnset(mixed $offset) : void
    public count() : int
    public current() : mixed
    public key() : scalar
    public next() : void
    public rewind() : void
    public valid() : bool
    public previous() : void
    public forward() : void
    public __toString() : string
    public compare(mixed $compare_with) : int

    /* Inherited from ComparisonTrait */
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

## The Obj class

An object implementation of `object`.

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
    public compare(mixed $compare_with) : int

    /* Inherited from ComparisonTrait */
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

## The Str class

An object implementation of `string`.

###  Class synopsis

```php
class Phrity\O\Str {

    /* Methods */
    public __construct(mixed ...$args)
    public __invoke(mixed $offset) : string
    public __toString() : string
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

## The Integer class

An object implementation of `int`.

###  Class synopsis

```php
class Phrity\O\Integer {

    /* Methods */
    public __construct(mixed ...$args)
    public __invoke(mixed $offset) : int
    public __toString() : string
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

## The Number class

An object implementation of `float`.

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


## Versions

* `1.2` - `Str` (string), `Number` (float), `Integer` (int) and `Boolean` (bool) classes
* `1.1` - Comparison support
* `1.0` - `Arr` (array) and `Obj` (object) classes