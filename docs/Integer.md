## Integer classes

The following ready-made classes are available.

### [Integer](Integer/Integer.md)

Generic integer class.
Uses CoercionTrait, ComparableTrait, InvokableTrait, StringableTrait and TypeTrait.
Implements Comparable and Stringable interfaces.


## Funcitonal traits

The following traits provide functionality. Adding more than one of these traits do not cause conflicts.

### [CoercionTrait](Integer/CoercionTrait.md)

Trait that support coercing non-integer content as input.

### [ComparableTrait](Integer/ComparableTrait.md)

Implements [Comparable](https://github.com/sirn-se/phrity-comparison) and [Equalable](https://github.com/sirn-se/phrity-comparison) interfaces.
Allows comparing class instances based on internal content.

### [InvokableTrait](Integer/InvokableTrait.md)

Allows get and set by invoke call.

### [StringableTrait](Integer/StringableTrait.md)

Implements [Stringable](https://www.php.net/manual/en/class.stringable) interface.
Allows string conversion of class to numeric output.

### [TypeTrait](Integer/TypeTrait.md)

Base trait for all traits using integer as source.
Defines source property, options and the `initialize` method.


## Defining data source

By default, source data is stored in protected property `$o_integer_source`.

If your class is using another property to keep integer data, it may define the source property by setting
`$o_source_ref` to the name of that property. The integer traits use this definition;

```php
    protected int $o_integer_source;
    protected string $o_source_ref = 'o_integer_source';
```

Example using standard integer source.

```php
class MyClass
{
    // Use one or more traits
    use ComparableTrait;
    use InvokableTrait;
    use StringableTrait;

    public function __construct(int $data)
    {
        // Set data provided in constructor.
        $this->o_integer_source = $data;
    }
}

$my = new MyClass(123);
```

Example using non-standard integer source.
```php
class MyClass
{
    // Use one or more traits
    use ComparableTrait;
    use InvokableTrait;
    use StringableTrait;

    // Define the variable shat should hold integer source data
    protected int $my_data_source;

    public function __construct(int $data)
    {
        // Tell the traits where to find the source data.
        $this->o_source_ref = 'my_data_source';

        // Set data provided in constructor.
        $this->my_data_source = $data;
    }
}

$my = new MyClass(123);
```