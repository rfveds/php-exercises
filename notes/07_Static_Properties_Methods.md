### Static Properties & Methods of a Class in PHP
- Static properties and methods belong to the class itself, not to instances of the class.
- You can create static properties and methods using the `static` keyword.
- Access to static method does not require an instance of the class.
- Example:
  ```php
  class Math {
        private static $pi = 3.14159;
    
        public static function getPi() {
            return self::$pi;
        }
    }
  
    echo Math::getPi(); // Output: 3.14159
    ```
  You cannot access private static property using `this` keyword. You must use `self` keyword, because `this`
  refers to the instance of the class, and no instance is created.

- Static properties can be used for memoization, caching, and other purposes where you want to store data
  that is shared across all instances of a class.
- Example of static property being used to connect to database using singleton pattern:
  ```php
  class Database {
        private static $instance = null;
        private $connection;
    
        private function __construct() {
            $this->connection = new PDO('mysql:host=localhost;dbname=test', 'root', '');
        }
    
        public static function getInstance() {
            if (self::$instance === null) {
                self::$instance = new Database();
            }
            return self::$instance;
        }
    
        public function getConnection() {
            return $this->connection;
        }
    }
  
    $db1 = Database::getInstance();
    $db2 = Database::getInstance();
  
    var_dump($db1 === $db2); // Output: true
    ```
  In this example, the `getInstance` method checks if the instance of the class has been created. If not, it creates
  a new instance and returns it. If the instance has already been created, it returns the existing instance. Private
  constructor ensures that no other instances of the class can be created.
- Static methods can be used to create utility functions that do not require an instance of the class.
- In most cases dependency injection is preferred over static methods and properties. Static methods and properties
  can make code harder to test and maintain, because they introduce global state and tight coupling between classes.