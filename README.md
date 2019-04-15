[![Build Status](https://travis-ci.org/sirn-se/phrity-o.svg?branch=master)](https://travis-ci.org/sirn-se/phrity-o)
[![Coverage Status](https://coveralls.io/repos/github/sirn-se/phrity-o/badge.svg?branch=master)](https://coveralls.io/github/sirn-se/phrity-o?branch=master)

# ”O”

Consistent object representation of basic data types

## Installation

Install with [Composer](https://getcomposer.org/);
```
composer require phrity/o
```

## Arr

An object implementation of array. Implements ArrayAccess, Countable and Iterator interfaces.

```php
$array = new O\Arr(); // Empty array
$array = new O\Arr([1, 2, 3]); // Numeric array
$array = new O\Arr(['a' => 1, 'b' => 2, 'c' => 3]); // Associative array
$array = new O\Arr($myclass); // Public properties to array
$array = new O\Arr(new O\Arr([1, 2, 3]); // Cloning
```

## Obj

An object implementation of object.

```php
$array = new O\Obj(); // Empty object
$array = new O\Obj(['a' => 1, 'b' => 2, 'c' => 3]); // Object from array
$array = new O\Obj($myclass); // Public properties to object
$array = new O\Obj(new O\Obj(['a' => 1, 'b' => 2, 'c' => 3]); // Cloning
```

