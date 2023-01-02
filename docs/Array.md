# Array classes

The following ready-made classes are available.

# Array traits

The following traits are available for array source type.

## Funcitonal traits

The following traits provide functionality. Adding more than one of these traits do not cause conflicts.

| Trait | Implements | Example |
| --- | --- | --- |
| [ArrayAccessTrait](Array/ArrayAccessTrait.md) | [ArrayAccess](https://www.php.net/manual/en/class.arrayaccess.php) | `$value = $class[1]` |
| [ComparableTrait](Array/ComparableTrait.md) | [Comparable](https://github.com/sirn-se/phrity-comparison), [Equalable](https://github.com/sirn-se/phrity-comparison) |  `$class->compare($other_class)` |
| [CountableTrait](Array/CountableTrait.md) | [Countable](https://www.php.net/manual/en/class.countable.php) |  `count($class)` |
| [QueueTrait](Array/QueueTrait.md) | |  `$class->enqueue('A')` |
| [StackTrait](Array/StackTrait.md) | |  `$class->push('A')` |
| [StringableTrait](Array/StringableTrait.md) | [Stringable](https://www.php.net/manual/en/class.stringable) | `echo $class` |

## Iterator traits

The following traits provide iterators. Uou should not use more than one iterator in a class.

| Trait | Implements | Example |
| --- | --- | --- |
| [IteratorTrait](Array/IteratorTrait.md) | [Iterator](https://www.php.net/manual/en/class.iterator.php), [Traversable](https://www.php.net/manual/en/class.traversable.php) |  `foreach ($class as $key => $val)` |
| [IteratorAggregateTrait](Array/IteratorAggregateTrait.md) | [IteratorAggregate](https://www.php.net/manual/en/class.iteratoraggregate), [Traversable](https://www.php.net/manual/en/class.traversable.php) |  `foreach ($class as $key => $val)` |
| [QueueIteratorTrait](Array/QueueIteratorTrait.md) | [IteratorAggregate](https://www.php.net/manual/en/class.iteratoraggregate), [Traversable](https://www.php.net/manual/en/class.traversable.php) |  `foreach ($class as $key => $val)` |
| [StackIteratorTrait](Array/StackIteratorTrait.md) | [IteratorAggregate](https://www.php.net/manual/en/class.iteratoraggregate), [Traversable](https://www.php.net/manual/en/class.traversable.php) |  `foreach ($class as $key => $val)` |

## Defining data source

By default, source data is stored in protected property `$o_array_source`.

If your class is using another property to keep array data, it may define the source property by setting
`$o_source_ref` to the name of that property. All array traits use this definition;

```php
protected array $o_array_source = [];
protected string $o_source_ref = 'o_array_source';
```


Example using standard array source.
```php
class MyClass
{
    // Use one or more traits
    use ArrayAccessTrait;
    use ComparableTrait;
    use CountableTrait;
    use IteratorTrait;
    use StringableTrait;

    public function __construct(array $data)
    {
        // Set data provided in constructor
        $this->o_array_source = $data;
    }
}

$my = new MyClass([1, 2, 3]);
```

Example using non-standard array source.
```php
class MyClass
{
    // Use one or more traits
    use ArrayAccessTrait;
    use ComparableTrait;
    use CountableTrait;
    use IteratorTrait;
    use StringableTrait;

    // Define the variable shat should hold array source data
    protected $my_data_source = [];

    public function __construct(array $data)
    {
        // Tell the "O" traits where to find the source data
        $this->o_source_ref = 'my_data_source';

        // Set data provided in constructor
        $this->my_data_source = $data;
    }
}

$my = new MyClass([1, 2, 3]);
```