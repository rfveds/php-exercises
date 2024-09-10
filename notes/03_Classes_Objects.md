### Classes in PHP
- A class is a blueprint for creating objects (a particular data structure), 
  providing initial values for state (member variables or attributes), 
  and implementations of behavior (member functions or methods).

### Access Modifiers
- **Public**: The property or method can be accessed from everywhere. This is default.
- **Protected**: The property or method can be accessed within the class and by classes derived from that class.
- **Private**: The property or method can ONLY be accessed within the class.

### Type Hinting
- Type hinting is used to specify the data type of argument or return value.

### Default Values in Class Properties
- We can set default values for class properties.
```php
class Person {
    public $name = "John";
    public $age = 25;
}
```

### Constructor
- A constructor allows you to initialize an object's properties upon creation of the object.
- If you create a __construct() function, PHP will automatically call this function when you create an object from a class.
```php
class Person {
    public $name;
    public $age;

    function __construct($name, $age) {
        $this->name = $name;
        $this->age = $age;
    }
}
```

### Class properties promotion
- It allows you to declare class properties and pass them as arguments to the constructor in a single line.
```php
class Person {
    public function __construct(public string $name, public int $age) {}
}
```
- Callable is not allowed in constructor property promotion.
```php
class Person {
    public function __construct(public callable $callback) {} // Error
}
```

### Nullsafe Operator
- It allows you to call methods on an object without having to check if the object is null.
```php
$person = new Person();
$person->getAddress()?->getCity(); // If getAddress() returns null, getCity() will not be called.
```

### Nullcoalescing Operator
- It returns the value of its first operand if it exists and is not NULL; otherwise, it returns its second operand.
- It doesn't work with methods that return void or null.
```php
$person = new Person();
$city = $person->getAddress()->getCity() ?? "Unknown";
```

### Combining Nullsafe and Nullcoalescing Operator
```php
$city = $person->getAddress()?->getCity() ?? "Unknown";
```


### Chaining Methods
- Chaining methods is a technique that allows you to call multiple methods in a single line.
```php
class Person {
    private $name;
    private $age;

    public function setName($name) {
        $this->name = $name;
        return $this;
    }

    public function setAge($age) {
        $this->age = $age;
        return $this;
    }
}

$person = new Person();
$person->setName("John")->setAge(25);
```

### Destructor
- A destructor is called when the object is no more referenced or if its destructor is explicitly called.
- If you create a __destruct() function, PHP will automatically call this function at the end of the script.
- Setting an object to null will destroy the object.
- Using exit() or die() will also destroy the object.
```php
class Person {
    public function __destruct() {
        echo "The object has been destroyed";
    }
}
```

### PHP StdClass
- The stdClass is a generic empty class that is used to create objects.
- It is used in json_decode() function to convert JSON data into an object.
```php
$obj = new stdClass();
$obj->name = "John";
$obj->age = 25;
```
- It is used when casting an array to an object.
```php
$arr = ['name' => 'John', 'age' => 25];
$obj = (object) $arr;
$obj->name; // John
$obj->age; // 25
```
- Casting integer to object.
```php
$obj = (object) 10;
$obj->scalar; // 10
```