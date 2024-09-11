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
- What happens when you assign variable to another variable?
```php
$person3 = $person1;
echo $person1 == $person3; // 1
echo $person1 === $person3; // 1
```
- When you assign `$person1` to `$person3`, you are not creating a new object. You are just creating a reference to the same object. 
  That's why `==` and `===` return `1` in this case.
- Variable name are stored in symbol table and point to the same object in memory.
- Zend value is a C language structure that represents where the value is stored in memory.
- Objects in PHP are passed by value, but the value is a reference to the object.