[![Build Status](https://travis-ci.org/sirn-se/phrity-o.svg?branch=master)](https://travis-ci.org/sirn-se/phrity-o)
[![Coverage Status](https://coveralls.io/repos/github/sirn-se/phrity-o/badge.svg?branch=master)](https://coveralls.io/github/sirn-se/phrity-o?branch=master)

# O

Consistent object representation of basic data types.
Inheritance friendly implementation.
Provides `Arr` (array), `Obj` (object), `Str` (string), `Number` (float), `Integer` (int) and `Boolean` (bool) classes.

## Installation

Install with [Composer](https://getcomposer.org/);
```
composer require phrity/o
```

## Documentation

[Full documentation.](https://phrity.sirn.se/o)

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


## Versions

| Version | PHP | |
| --- | --- | --- |
| `1.2` | `^7.1` | `Str` (string), `Number` (float), `Integer` (int) and `Boolean` (bool) classes |
| `1.1` | `>=5.6` | Comparison support |
| `1.0` | `>=5.6` | `Arr` (array) and `Obj` (object) classes |
