### Late Static Binding in PHP
- Early Binding happens at compile time.
- Late Binding happens at runtime.

##### Problem with Early Binding
- In PHP, when we use `self` keyword, it refers to the class in which it is used.
- This can cause issues when we have a parent class and a child
- If we use `self` in the parent class, it will refer to the parent class, not the child class.
- This can lead to unexpected behavior.
- We can use `static` keyword to solve this problem.
- `static` keyword refers to the class in which it is used.
- It allows us to use late static binding.
- Late static binding allows us to reference the called class in the context of static inheritance.
- Example:

```php
class ParentClass {
    public static function whoAmI() {
        echo static::class;
    }
}

class ChildClass extends ParentClass {
}

ChildClass::whoAmI(); // ChildClass
```

- In the above example, `static::class` refers to the class in which it is used.
- So, when we call `ChildClass::whoAmI()`, it will output `ChildClass`.
