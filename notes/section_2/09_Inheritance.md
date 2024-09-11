### Inheritance in PHP
- Inheritance is a mechanism in PHP that allows a class to inherit properties and methods from another class.
- The class that inherits properties and methods is called a **child class** or **subclass**.
- The class that provides properties and methods to be inherited is called a **parent class** or **superclass**.
- Only public and protected properties and methods can be inherited.
- The child class can override the properties and methods of the parent class.
- You cannot decrease the visibility of inherited properties and methods in the child class.
- Inheritance is a 'is-a' relationship.
- Example:
  ```php
  class Animal {
      public $name;
      
      public function __construct($name) {
          $this->name = $name;
      }
      
      public function eat() {
          echo $this->name . ' is eating.';
      }
  }
  
  class Dog extends
    Animal {
        public function bark() {
            echo $this->name . ' is barking.';
        }
    }
  
    $dog = new Dog('Buddy');
    $dog->eat(); // Output: Buddy is eating.
    $dog->bark(); // Output: Buddy is barking.
    ```
- Calling the parent class constructor from the child class:
  ```php
  class Animal {
      public $name;
      
      public function __construct($name) {
          $this->name = $name;
      }
      
      public function eat() {
          echo $this->name . ' is eating.';
      }
  }
  
  class Dog extends
    Animal {
        public function __construct($name) {
            parent::__construct($name);
        }
        
        public function bark() {
            echo $this->name . ' is barking.';
        }
    }
  
    $dog = new Dog('Buddy');
    $dog->eat(); // Output: Buddy is eating.
    $dog->bark(); // Output: Buddy is barking.
    ```
- Signature of the child class constructor does not have to match the parent class constructor.

#### Final Classes and Methods
- You can prevent a class from being inherited by using the `final` keyword.
