[![Build Status](https://travis-ci.org/sirn-se/phrity-o.svg?branch=master)](https://travis-ci.org/sirn-se/phrity-o)
[![Coverage Status](https://coveralls.io/repos/github/sirn-se/phrity-o/badge.svg?branch=master)](https://coveralls.io/github/sirn-se/phrity-o?branch=master)

# O

Consistent object representation of basic data types.
Inheritance friendly implementation.
Provides wrapper classes for array, object, string, float, int and bool, plus Queue and Stack collections.

## Installation

Install with [Composer](https://getcomposer.org/);
```
composer require phrity/o
```

## Classes

The package contain the following classes:

| Class | Reflects | Implements |
| --- | --- | --- |
| Arr | `array` | [ArrayAccess](https://www.php.net/manual/en/class.arrayaccess.php) [Countable](https://www.php.net/manual/en/class.countable.php) [Iterator](https://www.php.net/manual/en/class.iterator.php) [Traversable](https://www.php.net/manual/en/class.traversable.php) [Comparable](https://github.com/sirn-se/phrity-comparison) [Equalable](https://github.com/sirn-se/phrity-comparison)
| Obj | `object` | [Comparable](https://github.com/sirn-se/phrity-comparison) [Equalable](https://github.com/sirn-se/phrity-comparison)
| Str | `string` | [Comparable](https://github.com/sirn-se/phrity-comparison) [Equalable](https://github.com/sirn-se/phrity-comparison)
| Integer | `int` | [Comparable](https://github.com/sirn-se/phrity-comparison) [Equalable](https://github.com/sirn-se/phrity-comparison)
| Number | `float` | [Comparable](https://github.com/sirn-se/phrity-comparison) [Equalable](https://github.com/sirn-se/phrity-comparison)
| Boolean | `bool` | [Comparable](https://github.com/sirn-se/phrity-comparison) [Equalable](https://github.com/sirn-se/phrity-comparison)
| Queue |  | [Countable](https://www.php.net/manual/en/class.countable.php) [Iterator](https://www.php.net/manual/en/class.iterator.php) [Traversable](https://www.php.net/manual/en/class.traversable.php) [Comparable](https://github.com/sirn-se/phrity-comparison) [Equalable](https://github.com/sirn-se/phrity-comparison)
| Stack |  | [Countable](https://www.php.net/manual/en/class.countable.php) [Iterator](https://www.php.net/manual/en/class.iterator.php) [Traversable](https://www.php.net/manual/en/class.traversable.php) [Comparable](https://github.com/sirn-se/phrity-comparison) [Equalable](https://github.com/sirn-se/phrity-comparison)

## Examples

Brief examples below. The [full documentation.](https://phrity.sirn.se/o) contains more example.

### Scalar types

´´´php
$str = new Str('hello world');
$str(); // Getter
$str('world'); // Setter

$int = new Integer(1234);
$int(); // Getter
$int(5678); // Setter

$num = new Number(12.34);
$num(); // Getter
$num(56.78); // Setter

$bool = new Boolean(true);
$bool(); // Getter
$bool(false); // Setter
´´´

### Complex types

´´´php
$array = new Arr([1, 2, 3]);
$array[] = 7; // ArrayAccess support
count($array); // Countable support
foreach ($array as $key => $value) {} // Iterator support
$array->equals(new Arr([2, 3, 4])); // Comparison support

$object = new Obj(['a' => 1, 'b' => 2, 'c' => 3]);
$object->b = 5; // Property access
$object->equals(new Obj(['c' => 1, 'd' => 2])); // Comparison support
´´´

### Collection types

´´´php
$queue = new Queue([1, 2, 3]);
count($queue); // Countable support
foreach ($queue as $item) {} // Consuming iterator support
$queue->equals(new Queue([2, 3, 4])); // Comparison support

$stack = new Stack([1, 2, 3]);
count($stack); // Countable support
foreach ($stack as $item) {} // Consuming iterator support
$stack->equals(new Stack([2, 3, 4])); // Comparison support
´´´

## Versions

| Version | PHP | |
| --- | --- | --- |
| `1.3` | `^7.1` | `Queue` and  `Stack` collection classes |
| `1.2` | `^7.1` | `Str` (string), `Number` (float), `Integer` (int) and `Boolean` (bool) classes |
| `1.1` | `>=5.6` | Comparison support |
| `1.0` | `>=5.6` | `Arr` (array) and `Obj` (object) classes |
