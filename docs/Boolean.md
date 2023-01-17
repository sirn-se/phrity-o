# [Docs](../../README.md) / Boolean

## Boolean classes

The following ready-made classes are available.

### [Boolean](Boolean/Boolean.md)

Generic boolean class.
Uses CoercionTrait, ComparableTrait, InvokableTrait, StringableTrait and TypeTrait.
Implements Comparable and Stringable interfaces.


## Funcitonal traits

The following traits provide functionality. Adding more than one of these traits do not cause conflicts.

### [CoercionTrait](Boolean/CoercionTrait.md)

Trait that support coercing non-boolean content as input.

### [ComparableTrait](Boolean/ComparableTrait.md)

Implements [Comparable](https://github.com/sirn-se/phrity-comparison) and [Equalable](https://github.com/sirn-se/phrity-comparison) interfaces.
Allows comparing class instances based on internal content.

### [InvokableTrait](Boolean/InvokableTrait.md)

Allows get and set by invoke call.

### [StringableTrait](Boolean/StringableTrait.md)

Implements [Stringable](https://www.php.net/manual/en/class.stringable) interface.
Allows string conversion of class to "false" or "true".

### [TypeTrait](Boolean/TypeTrait.md)

Base trait for all traits using boolean as source.
Defines source property, options and the `initialize` method.


## Defining data source

By default, source data is stored in protected property `$o_boolean_source`.

If your class is using another property to keep boolean data, it may define the source property by setting
`$o_source_ref` to the name of that property. The boolean traits use this definition;

```php
    protected bool $o_boolean_source;
    protected string $o_source_ref = 'o_boolean_source';
```

Example using standard boolean source.

```php
class MyClass
{
    // Use one or more traits
    use ComparableTrait;
    use InvokableTrait;
    use StringableTrait;

    public function __construct(bool $data)
    {
        // Set data provided in constructor.
        $this->o_boolean_source = $data;
    }
}

$my = new MyClass(true);
```

Example using non-standard boolean source.
```php
class MyClass
{
    // Use one or more traits
    use ComparableTrait;
    use InvokableTrait;
    use StringableTrait;

    // Define the variable shat should hold boolean source data
    protected bool $my_data_source;

    public function __construct(bool $data)
    {
        // Tell the traits where to find the source data.
        $this->o_source_ref = 'my_data_source';

        // Set data provided in constructor.
        $this->my_data_source = $data;
    }
}

$my = new MyClass(true);
```