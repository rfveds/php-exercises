### Anonymous Classes in PHP
- Anonymous classes are classes without a name.
- They are useful when you need a class only once during the execution of your script.
- Anonymous classes are defined using the `new class` keyword followed by the class definition.
- You can assign an anonymous class to a variable or use it directly.
- Anonymous classes can extend other classes or implement interfaces.
- Example:
```php
$person = new class extends Person implements MyInterface { 
    
    use MyTrait;

    public $name = 'John';
    public $age = 30;
};

echo $person->name; // John
```
- Use cases:
  - Testing: You can create anonymous classes to test your code. Useful for mocking objects.