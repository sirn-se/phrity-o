# [Docs](../../README.md) / Array

## Array classes

The following ready-made classes are available.

### [Arr](Array/Arr.md)

Generic array class.
Uses ArrayAccessTrait, CoercionTrait, ComparableTrait, CountableTrait, IteratorTrait, StringableTrait and TypeTrait.
Implements ArrayAccess, Comparable, Countable, Stringable and Iterator interfaces.

### [Queue](Array/Queue.md)

Queue implementation class.
Uses CoercionTrait, ComparableTrait, CountableTrait, QueueIteratorTrait, QueueTrait, StringableTrait and TypeTrait.
Implements Comparable, Countable, Stringable and IteratorAggregate interfaces.

### [Stack](Array/Stack.md)

Stack implementation class.
Uses CoercionTrait, ComparableTrait, CountableTrait, StackIteratorTrait,StackTrait, StringableTrait and TypeTrait.
Implements Comparable, Countable, Stringable and IteratorAggregate interfaces.



## Funcitonal traits

The following traits provide functionality. Adding more than one of these traits do not cause conflicts.

### [ArrayAccessTrait](Array/ArrayAccessTrait.md)

Implements [ArrayAccess](https://www.php.net/manual/en/class.arrayaccess.php) interface.
Allows accessing class as an array, using `[]` with offset to get, set and check array content.

### [CoercionTrait](Array/CoercionTrait.md)

Trait that support coercing non-array content as input.

### [ComparableTrait](Array/ComparableTrait.md)

Implements [Comparable](https://github.com/sirn-se/phrity-comparison) and [Equalable](https://github.com/sirn-se/phrity-comparison) interfaces.
Allows comparing class instances based on internal content.

### [CountableTrait](Array/CountableTrait.md)

Implements [Countable](https://www.php.net/manual/en/class.countable.php) interface.
Enables `count()` function on class.

### [QueueTrait](Array/QueueTrait.md)

Implements queue methods.
As a Queue (FIFO) implementation, `enqueue` will put items at the end and `dequeue` will retrieve the first item.

### [StackTrait](Array/StackTrait.md)

Adds stack methods.
As a Stack (LIFO) implementation, `push` will put items at the top and `pop` will retrieve the last added item.

### [StringableTrait](Array/StringableTrait.md)

Implements [Stringable](https://www.php.net/manual/en/class.stringable) interface.
Allows string conversion of class to `classname(count)` (namespace is excluded).

### [TypeTrait](Array/TypeTrait.md)

Base trait for all traits using array as source.
Defines source property, options and the `initialize` method.



## Iterator traits

The following traits provide iterators. You should not use more than one iterator in a class.

### [IteratorAggregateTrait](Array/IteratorAggregateTrait.md)

Implements [IteratorAggregate](https://www.php.net/manual/en/class.iteratoraggregate) and [Traversable](https://www.php.net/manual/en/class.traversable.php) interfaces.
Enables traversing methods such as `foreach()` by aggregating a [Generator](https://www.php.net/manual/en/class.generator).

### [IteratorTrait](Array/IteratorTrait.md)

Implements [Iterator](https://www.php.net/manual/en/class.iterator.php) and [Traversable](https://www.php.net/manual/en/class.traversable.php) interfaces.
Enables traversing methods such as `foreach()`;

### [QueueIteratorTrait](Array/QueueIteratorTrait.md)

Same as IteratorAggregateTrait, except it will **consume** array content.
As a Queue (FIFO) iterator, it will consume from the start of the array and forward.

### [StackIteratorTrait](Array/StackIteratorTrait.md)

Same as IteratorAggregateTrait, except it will **consume** array content.
As a Stack (LIFO) iterator, it will consume from the end of the array and backwards.


## Defining data source

By default, source data is stored in protected property `$o_array_source`.

If your class is using another property to keep array data, it may define the source property by setting
`$o_source_ref` to the name of that property. The array traits use this definition;

```php
    protected array $o_array_source;
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
        // Set data provided in constructor.
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
    protected array $my_data_source;

    public function __construct(array $data)
    {
        // Tell the traits where to find the source data.
        $this->o_source_ref = 'my_data_source';

        // Set data provided in constructor.
        $this->my_data_source = $data;
    }
}

$my = new MyClass([1, 2, 3]);
```