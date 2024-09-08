### How object comparison works in PHP
- PHP has two types of comparison operators: `==` and `===`.
- `==` compares the values of two objects - comparison operator.
- `===` compares the references of two objects - identity operator.
- Example:
```php
class Person {
    public $name;
    public $age;
}

$person1 = new Person();
$person1->name = 'John';
$person1->age = 30;

$person2 = new Person();
$person2->name = 'John';
$person2->age = 30;

echo $person1 == $person2; // 1
echo $person1 === $person2; // 0
```