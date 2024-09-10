### Class Constants in PHP
- Class constants are similar to regular constants, but they are defined within a class and are accessed using the scope resolution operator `::`.
- They are declared using the `const` keyword followed by the constant name and its value.
- Class constants are useful for defining values that are associated with a class and should not change during the execution of the program.
- They can be accessed without creating an instance of the class.
- Constants should have a visibility modifier (`public`, `protected`, or `private`) and can be accessed from outside the class depending on the visibility.
- Should be in uppercase letters.
- Example:
  ```php
  class Math {
     public const PI = 3.14159;
  }

  echo Math::PI; // Output: 3.14159
  
  $math = new Math();
  echo $math::PI; // Output: 3.14159
  ```
- Accessing class constants using the `self` keyword:
  ```php
  class Math {
     public const PI = 3.14159;

     public function getPi() {
        return self::PI;
     }
  }

  $math = new Math();
  echo $math->getPi(); // Output: 3.14159
  ```
- Self refers to the current class.

#### Class constants can be useful for setting values that are not changed often, for example setting transaction status; example:
```php
class Transaction
{
    public const STATUS_PENDING = 'pending';
    public const STATUS_COMPLETED = 'completed';
    public const STATUS_FAILED = 'failed';
    
    public const STATUSES = [
        self::STATUS_PENDING => 'Pending',
        self::STATUS_COMPLETED => 'Completed',
        self::STATUS_FAILED => 'Failed',
    ];
    
    private string $status;
    
    public function __construct(string $status)
    {
        if (! isset(self::STATUSES[$status])) {
            throw new InvalidArgumentException('Invalid status');
        }
        
        $this->status = $status;
    }
}
```
