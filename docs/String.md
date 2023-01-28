# [Docs](../../README.md) / String

## String classes

The following ready-made classes are available.

### [String](String/Str.md)

Generic float class.
Uses CoercionTrait, ComparableTrait, InvokableTrait, StringableTrait and TypeTrait.
Implements Comparable and Stringable interfaces.


## Funcitonal traits

The following traits provide functionality. Adding more than one of these traits do not cause conflicts.

### [CoercionTrait](String/CoercionTrait.md)

Trait that support coercing non-string content as input.

### [ComparableTrait](String/ComparableTrait.md)

Implements [Comparable](https://github.com/sirn-se/phrity-comparison) and [Equalable](https://github.com/sirn-se/phrity-comparison) interfaces.
Allows comparing class instances based on internal content.

### [InvokableTrait](String/InvokableTrait.md)

Allows get and set by invoke call.

### [StringableTrait](String/StringableTrait.md)

Implements [Stringable](https://www.php.net/manual/en/class.stringable) interface.
Allows string conversion of class to numeric output.

### [TypeTrait](String/TypeTrait.md)

Base trait for all traits using string as source.
Defines source property, options and the `initialize` method.


## Defining data source

By default, source data is stored in protected property `$o_string_source`.

If your class is using another property to keep float data, it may define the source property by setting
`$o_source_ref` to the name of that property. The float traits use this definition;

```php
    protected string $o_string_source;
    protected string $o_source_ref = 'o_string_source';
```

Example using standard string source.

```php
class MyClass
{
    // Use one or more traits
    use ComparableTrait;
    use InvokableTrait;
    use StringableTrait;

    public function __construct(string $data)
    {
        // Set data provided in constructor.
        $this->o_string_source = $data;
    }
}

$my = new MyClass("hey");
```

Example using non-standard string source.
```php
class MyClass
{
    // Use one or more traits
    use ComparableTrait;
    use InvokableTrait;
    use StringableTrait;

    // Define the variable shat should hold float source data
    protected string $my_data_source;

    public function __construct(string $data)
    {
        // Tell the traits where to find the source data.
        $this->o_source_ref = 'my_data_source';

        // Set data provided in constructor.
        $this->my_data_source = $data;
    }
}

$my = new MyClass("hey");
```