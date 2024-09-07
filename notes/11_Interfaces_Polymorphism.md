### Interfaces and Polymorphism in PHP

- An interface is a contract that defines a set of methods that a class must implement.
- All methods declared in an interface must be public.
- Multiple interfaces can be implemented by a single class.
- Interface can be extended by another interface.
- Interface cannot have properties, but can have constants (constant can not be overridden).
- Example:

```php
interface Shape {
    public function __construct($radius);
    public function getArea(): float;
}

class Circle implements Shape {
    private $radius;

    public function __construct($radius) {
        $this->radius = $radius;
    }

    public function getArea(): float {
        return pi() * $this->radius * $this->radius;
    }
}
```

### Polymorphism
- Polymorphism allows objects of different classes to be treated as objects of a common superclass.
- Polymorphism is achieved by using interfaces or inheritance.
- Example:

```php
interface Shape {
    public function getArea(): float;
}

class Circle implements Shape {
    private $radius;

    public function __construct($radius) {
        $this->radius = $radius;
    }

    public function getArea(): float {
        return pi() * $this->radius * $this->radius;
    }
}

class Rectangle implements Shape {
    private $width;
    private $height;

    public function __construct($width, $height) {
        $this->width = $width;
        $this->height = $height;
    }

    public function getArea(): float {
        return $this->width * $this->height;
    }
}


$circle = new Circle(5);
$rectangle = new Rectangle(4, 6);

echo $circle->getArea(); // 78.54
echo $rectangle->getArea(); // 24
```

