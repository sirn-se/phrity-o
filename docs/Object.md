# [Docs](../../README.md) / Object

## Object classes

The following ready-made classes are available.

### [Object](Object/Obj.md)

Generic object class.
Uses CoercionTrait, ComparableTrait, PropertyAccessTrait, StringableTrait and TypeTrait.
Implements Comparable and Stringable interfaces.


## Funcitonal traits

The following traits provide functionality. Adding more than one of these traits do not cause conflicts.

### [CoercionTrait](Object/CoercionTrait.md)

Trait that support coercing non-float content as input.

### [ComparableTrait](Object/ComparableTrait.md)

Implements [Comparable](https://github.com/sirn-se/phrity-comparison) and [Equalable](https://github.com/sirn-se/phrity-comparison) interfaces.
Allows comparing class instances based on internal content.

### [JsonSerializableTrait](Object/JsonSerializableTrait.md)

Implements [JsonSerializable](https://www.php.net/manual/en/jsonserializable.jsonserialize.php) interface.
Provides class properties for JSON encode.

### [PropertyAccessTrait](Object/PropertyAccessTrait.md)

Enable accessing source data as object properties.

### [StringableTrait](Object/StringableTrait.md)

Implements [Stringable](https://www.php.net/manual/en/class.stringable) interface.
Allows string conversion of class to numeric output.

### [TypeTrait](Object/TypeTrait.md)

Base trait for all traits using object as source.
Defines source property, options and the `initialize` method.


## Iterator traits

The following traits provide iterators.

### [IteratorAggregateTrait](Object/IteratorAggregateTrait.md)

Implements [IteratorAggregate](https://www.php.net/manual/en/class.iteratoraggregate) and [Traversable](https://www.php.net/manual/en/class.traversable.php) interfaces.
Enables traversing methods such as `foreach()` by aggregating a [Generator](https://www.php.net/manual/en/class.generator).


## Defining data source

By default, source data is stored in protected property `$o_object_source`.

If your class is using another property to keep object data, it may define the source property by setting
`$o_source_ref` to the name of that property. The object traits use this definition;

```php
    protected object $o_object_source;
    protected string $o_source_ref = 'o_object_source';
```

Example using standard object source.

```php
class MyClass
{
    // Use one or more traits
    use ComparableTrait;
    use PropertyAccessTrait;
    use StringableTrait;

    public function __construct(object $data)
    {
        // Set data provided in constructor.
        $this->o_object_source = $data;
    }
}

$my = new MyClass((object)["a" => 1]);
```

Example using non-standard object source.
```php
class MyClass
{
    // Use one or more traits
    use ComparableTrait;
    use PropertyAccessTrait;
    use StringableTrait;

    // Define the variable shat should hold object source data
    protected object $my_data_source;

    public function __construct(object $data)
    {
        // Tell the traits where to find the source data.
        $this->o_source_ref = 'my_data_source';

        // Set data provided in constructor.
        $this->my_data_source = $data;
    }
}

$my = new MyClass((object)["a" => 1]);
```