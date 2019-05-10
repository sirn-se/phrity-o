[![Build Status](https://travis-ci.org/sirn-se/phrity-o.svg?branch=master)](https://travis-ci.org/sirn-se/phrity-o)
[![Coverage Status](https://coveralls.io/repos/github/sirn-se/phrity-o/badge.svg?branch=master)](https://coveralls.io/github/sirn-se/phrity-o?branch=master)

# ”O”

Consistent object representation of basic data types. Inheritance friendly implementation. Currently provides `Arr` (array) and `Obj` (object) classes.

## Installation

Install with [Composer](https://getcomposer.org/);
```
composer require phrity/o
```

## Arr

An object implementation of `array`. Implements `ArrayAccess`, `Countable` and `Iterator` interfaces.

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
```

## Obj

An object implementation of `object`.

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
```

## Versions

* `1.0` - `Arr` (array) and `Obj` (object) classes. PHP `5.6` and `7.*` support.