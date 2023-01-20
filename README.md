[![Build Status](https://github.com/sirn-se/phrity-o/actions/workflows/acceptance.yml/badge.svg)](https://github.com/sirn-se/phrity-o/actions)
[![Coverage Status](https://coveralls.io/repos/github/sirn-se/phrity-o/badge.svg?branch=master)](https://coveralls.io/github/sirn-se/phrity-o?branch=master)

# O

Consistent object representation of data types.

Contains a number of traits that provide interface implementation and other functionality.
These traits can be included in any class that require supported functionality.

Also provides ready-made wrapper classes for array, object, string, float, int and bool, plus Queue and Stack collections.
Inheritance friendly implementation.


## Installation

Install with [Composer](https://getcomposer.org/);
```
composer require phrity/o
```

## Content by source type

* [Array](docs/Array.md) classes and traits
* [Boolean](docs/Boolean.md) class and traits
* [Integer](docs/Integer.md) class and traits
* [Number](docs/Number.md) class and traits
* [Object](docs/Number.md) class and traits
* [String](docs/String.md) class and traits


## Classes

The following ready-made classes are available.

| Class | Source | Implements |
| --- | --- | --- |
| [Arr](docs/Array/Arr.md)              | `array`   | [ArrayAccess](https://www.php.net/manual/en/class.arrayaccess.php) [Comparable](https://github.com/sirn-se/phrity-comparison) [Countable](https://www.php.net/manual/en/class.countable.php) [Equalable](https://github.com/sirn-se/phrity-comparison) [Iterator](https://www.php.net/manual/en/class.iterator.php) [Stringable](https://www.php.net/manual/en/class.stringable) [Traversable](https://www.php.net/manual/en/class.traversable.php) |
| [Boolean](docs/Boolean/Boolean.md)    | `bool`    | [Comparable](https://github.com/sirn-se/phrity-comparison) [Equalable](https://github.com/sirn-se/phrity-comparison) [Stringable](https://www.php.net/manual/en/class.stringable) |
| [Integer](docs/Integer/Integer.md)    | `int`     | [Comparable](https://github.com/sirn-se/phrity-comparison) [Equalable](https://github.com/sirn-se/phrity-comparison) [Stringable](https://www.php.net/manual/en/class.stringable) |
| [Number](docs/Number/Number.md)       | `float`   | [Comparable](https://github.com/sirn-se/phrity-comparison) [Equalable](https://github.com/sirn-se/phrity-comparison) [Stringable](https://www.php.net/manual/en/class.stringable) |
| [Obj](docs/Object/Obj.md)             | `object`  | [Comparable](https://github.com/sirn-se/phrity-comparison) [Equalable](https://github.com/sirn-se/phrity-comparison) [Stringable](https://www.php.net/manual/en/class.stringable) |
| [Stack](docs/Array/Stack.md)          | `array`   | [Comparable](https://github.com/sirn-se/phrity-comparison) [Countable](https://www.php.net/manual/en/class.countable.php) [Equalable](https://github.com/sirn-se/phrity-comparison) [IteratorAggregate](https://www.php.net/manual/en/class.iteratoraggregate) [Stringable](https://www.php.net/manual/en/class.stringable) [Traversable](https://www.php.net/manual/en/class.traversable.php) |
| [Str](docs/String/Str.md)             | `string`  | [Comparable](https://github.com/sirn-se/phrity-comparison) [Equalable](https://github.com/sirn-se/phrity-comparison) [Stringable](https://www.php.net/manual/en/class.stringable) |
| [Queue](docs/Array/Queue.md)          | `array`   | [Comparable](https://github.com/sirn-se/phrity-comparison) [Countable](https://www.php.net/manual/en/class.countable.php) [Equalable](https://github.com/sirn-se/phrity-comparison) [IteratorAggregate](https://www.php.net/manual/en/class.iteratoraggregate) [Stringable](https://www.php.net/manual/en/class.stringable) [Traversable](https://www.php.net/manual/en/class.traversable.php) |


## Traits

Traits are defined by source type. The following traits are available.

| Trait | Provides | By source type |
| --- | --- | --- |
| ArrayAccessTrait          | [ArrayAccess](https://www.php.net/manual/en/class.arrayaccess.php) | [Array](docs/Array/ArrayAccessTrait.md) |
| CoercionTrait             |  | [Array](docs/Array/CoercionTrait.md) [Boolean](docs/Boolean/CoercionTrait.md) [Integer](docs/Integer/CoercionTrait.md) [Number](docs/Number/CoercionTrait.md) [Object](docs/Object/CoercionTrait.md) [String](docs/String/CoercionTrait.md) |
| ComparableTrait           | [Comparable](https://github.com/sirn-se/phrity-comparison) [Equalable](https://github.com/sirn-se/phrity-comparison) | [Array](docs/Array/ComparableTrait.md) [Boolean](docs/Boolean/ComparableTrait.md) [Integer](docs/Integer/ComparableTrait.md) [Number](docs/Number/ComparableTrait.md) [Object](docs/Object/ComparableTrait.md) [String](docs/String/ComparableTrait.md) |
| CountableTrait            | [Countable](https://www.php.net/manual/en/class.countable.php) | [Array](docs/Array/CountableTrait.md) |
| InvokableTrait            |  | [Boolean](docs/Boolean/InvokableTrait.md) [Integer](docs/Integer/InvokableTrait.md) [Number](docs/Number/InvokableTrait.md) [String](docs/String/InvokableTrait.md) |
| IteratorAggregateTrait    | [IteratorAggregate](https://www.php.net/manual/en/class.iteratoraggregate) [Traversable](https://www.php.net/manual/en/class.traversable.php) | [Array](docs/Array/IteratorAggregateTrait.md) |
| IteratorTrait             | [Iterator](https://www.php.net/manual/en/class.iterator.php) [Traversable](https://www.php.net/manual/en/class.traversable.php) | [Array](docs/Array/IteratorTrait.md) |
| PropertyAccessTrait       |  | [Object](docs/Object/PropertyAccessTrait.md) |
| QueueIteratorTrait        | [IteratorAggregate](https://www.php.net/manual/en/class.iteratoraggregate) [Traversable](https://www.php.net/manual/en/class.traversable.php) | [Array](docs/Array/QueueIteratorTrait.md) |
| QueueTrait                |  | [Array](docs/Array/QueueTrait.md) |
| StackIteratorTrait        | [IteratorAggregate](https://www.php.net/manual/en/class.iteratoraggregate) [Traversable](https://www.php.net/manual/en/class.traversable.php) | [Array](docs/Array/StackIteratorTrait.md) |
| StackTrait                |  | [Array](docs/Array/StackTrait.md) |
| StringableTrait           | [Stringable](https://www.php.net/manual/en/class.stringable) | [Array](docs/Array/StringableTrait.md) [Boolean](docs/Boolean/StringableTrait.md) [Integer](docs/Integer/StringableTrait.md) [Number](docs/Number/StringableTrait.md) [Object](docs/Object/StringableTrait.md) [String](docs/String/StringableTrait.md) |
| TypeTrait                 |  | [Array](docs/Array/TypeTrait.md) [Boolean](docs/Boolean/TypeTrait.md) [Integer](docs/Integer/TypeTrait.md) [Number](docs/Number/TypeTrait.md) [Object](docs/Object/TypeTrait.md) [String](docs/String/TypeTrait.md) |


## Examples

Brief examples of classes below.

### Scalar types

```php
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
```

### Complex types

```php
$array = new Arr([1, 2, 3]);
$array[] = 7; // ArrayAccess support
count($array); // Countable support
foreach ($array as $key => $value) {} // Iterator support
$array->equals(new Arr([2, 3, 4])); // Comparison support

$object = new Obj(['a' => 1, 'b' => 2, 'c' => 3]);
$object->b = 5; // Property access
$object->equals(new Obj(['c' => 1, 'd' => 2])); // Comparison support
```

### Collection types

```php
$queue = new Queue([1, 2, 3]);
$queue->enqueue(4);
$queue->dequeue();
count($queue); // Countable support
foreach ($queue as $key => $item) {} // Consuming iterator support
$queue->equals(new Queue([2, 3, 4])); // Comparison support

$stack = new Stack([1, 2, 3]);
$stack->push(4);
$stack->pop();
count($stack); // Countable support
foreach ($stack as $key => $item) {} // Consuming iterator support
$stack->equals(new Stack([2, 3, 4])); // Comparison support
```

## Versions

| Version | PHP | |
| --- | --- | --- |
| `2.0` | `^8.0` | Implementation as Traits |
| `1.5` | `^8.0` | Fix for PHP 8.x versions |
| `1.4` | `^7.1\|^8.0` |  |
| `1.3` | `^7.1` | `Queue` and  `Stack` collection classes |
| `1.2` | `^7.1` | `Str` (string), `Number` (float), `Integer` (int) and `Boolean` (bool) classes |
| `1.1` | `>=5.6` | Comparison support |
| `1.0` | `>=5.6` | `Arr` (array) and `Obj` (object) classes |
