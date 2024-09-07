### Magic methods in PHP
- Magic methods are special methods that are automatically called when certain events occur in a class.
- Magic methods are always preceded by two underscores (`__`).

#### __get() and __set()
- '__get()' is called when we try to access a property that is not accessible or not defined.
- '__set()' is called when we try to assign a value to a property that is not accessible or not defined.

```php
class Person {
    private $data = [];

    public function __get($name) {
        return $this->data[$name] ?? null;
    }

    public function __set($name, $value) {
        $this->data[$name] = $value;
    }
}

$person = new Person();
$person->name = 'John';
echo $person->name; // John
```

#### __isset() and __unset()
- '__isset()' is called when we use `isset()` or `empty()` on a property that is not accessible or not defined.
- '__unset()' is called when we use `unset()` on a property that is not accessible or not defined.

```php
class Person {
    private $data = [];

    public function __isset($name) {
        return array_key_exists($name, $this->data); 
    }

    public function __unset($name) {
        unset($this->data[$name]);
    }
}

$person = new Person();
$person->name = 'John';
isset($person->name); // true
unset($person->name);
isset($person->name); // false
```

#### __call() and __callStatic()
- '__call()' is called when we try to call a method that is not accessible or not defined.
- '__callStatic()' is called when we try to call a static method that is not accessible or not defined.

```php
class Person {
    public function __call($name, $arguments) {
        echo "Calling method '$name' with arguments: " . implode(', ', $arguments);
    }

    public static function __callStatic($name, $arguments) {
        echo "Calling static method '$name' with arguments: " . implode(', ', $arguments);
    }
}

$person = new Person();
$person->sayHello('John'); // Calling method 'sayHello' with arguments: John

Person::sayHello('John'); // Calling static method 'sayHello' with arguments: John
```

#### __toString()
- '__toString()' is called when we try to convert an object to a string using `echo` or `print`.

```php
class Person {
    public function __toString() {
        return 'This is a person object';
    }
}

$person = new Person();

echo $person; // This is a person object
```

#### __invoke()
- '__invoke()' is called when we try to call an object as a function.

```php
class Person {
    public function __invoke() {
        echo 'This is a callable object';
    }
}

$person = new Person();
$person(); // This is a callable object
```

#### __debugInfo()
- '__debugInfo()' is called when we use `var_dump()` on an object.
- It allows you to customize the output of `var_dump()` for the object.

```php
class Person {
    private $name = 'John';
    private $age = 30;

    public function __debugInfo() {
        return [
            'name' => $this->name,
            'age' => $this->age
        ];
    }
}

$person = new Person();

var_dump($person);
/*
object(Person)#1 (2) {
  ["name"]=>
  string(4) "John"
  ["age"]=>
  int(30)
}
*/
```