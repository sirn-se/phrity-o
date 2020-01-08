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

## Classes

| Class | Reflects | Implements | Documentation |
| --- | --- | --- | --- |
| Arr | `array` | [ArrayAccess](https://www.php.net/manual/en/class.arrayaccess.php) [Countable](https://www.php.net/manual/en/class.countable.php) [Iterator](https://www.php.net/manual/en/class.iterator.php) [Traversable](https://www.php.net/manual/en/class.traversable.php) [Comparable](https://github.com/sirn-se/phrity-comparison) [Equalable](https://github.com/sirn-se/phrity-comparison) | [Documentation](docs/class.arr.md)
| Obj | `object` | [Comparable](https://github.com/sirn-se/phrity-comparison) [Equalable](https://github.com/sirn-se/phrity-comparison) | [Documentation](docs/class.obj.md)
| Str | `string` | [Comparable](https://github.com/sirn-se/phrity-comparison) [Equalable](https://github.com/sirn-se/phrity-comparison) | [Documentation](docs/class.str.md)
| Integer | `int` | [Comparable](https://github.com/sirn-se/phrity-comparison) [Equalable](https://github.com/sirn-se/phrity-comparison) | [Documentation](docs/class.integer.md)
| Number | `float` | [Comparable](https://github.com/sirn-se/phrity-comparison) [Equalable](https://github.com/sirn-se/phrity-comparison) | [Documentation](docs/class.number.md)
| Boolean | `bool` | [Comparable](https://github.com/sirn-se/phrity-comparison) [Equalable](https://github.com/sirn-se/phrity-comparison) | [Documentation](docs/class.boolean.md)


## Versions

| Version | PHP | |
| --- | --- | --- |
| `1.2` | `^7.1` | `Str` (string), `Number` (float), `Integer` (int) and `Boolean` (bool) classes |
| `1.1` | `>=5.6` | Comparison support |
| `1.0` | `>=5.6` | `Arr` (array) and `Obj` (object) classes |
