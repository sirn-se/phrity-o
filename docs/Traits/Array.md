# Array traits

The following traits are available for array source type.

| Trait | Implements | Example |
| --- | --- | --- |
| [ArrayAccessTrait](Array/ArrayAccessTrait.md) | [ArrayAccess](https://www.php.net/manual/en/class.arrayaccess.php) | `$value = $class[1]` |
| [ComparableTrait](Array/ComparableTrait.md) | [Comparable](https://github.com/sirn-se/phrity-comparison), [Equalable](https://github.com/sirn-se/phrity-comparison) |  `$class->compare($other_class)` |
| [CountableTrait](Array/CountableTrait.md) | [Countable](https://www.php.net/manual/en/class.countable.php) |  `count($class)` |
| [IteratorTrait](Array/IteratorTrait.md) | [Iterator](https://www.php.net/manual/en/class.iterator.php), [Traversable](https://www.php.net/manual/en/class.traversable.php) |  `foreach ($class as $key => $val)` |
| [IteratorAggregateTrait](Array/IteratorAggregateTrait.md) | [IteratorAggregate](https://www.php.net/manual/en/class.iteratoraggregate), [Traversable](https://www.php.net/manual/en/class.traversable.php) |  `foreach ($class as $key => $val)` |
| [QueueTrait](Array/QueueTrait.md) | |  `$class->enqueue('A')` |
| [QueueIteratorTrait](Array/QueueIteratorTrait.md) | [IteratorAggregate](https://www.php.net/manual/en/class.iteratoraggregate), [Traversable](https://www.php.net/manual/en/class.traversable.php) |  `foreach ($class as $key => $val)` |
| [StackTrait](Array/StackTrait.md) | |  `$class->push('A')` |
| [StackIteratorTrait](Array/StackIteratorTrait.md) | [IteratorAggregate](https://www.php.net/manual/en/class.iteratoraggregate), [Traversable](https://www.php.net/manual/en/class.traversable.php) |  `foreach ($class as $key => $val)` |
| [StringableTrait](Array/StringableTrait.md) | [Stringable](https://www.php.net/manual/en/class.stringable) | `echo $class` |


## Defining data source

By default, source data is stored in protected property `$o_array_source`.

If your class is using another property to keep array data, it may define the source property by setting
`$o_source_ref` to the name of that property. All array traits use this definition;

```php
protected array $o_array_source = [];
protected string $o_source_ref = 'o_array_source';
```
