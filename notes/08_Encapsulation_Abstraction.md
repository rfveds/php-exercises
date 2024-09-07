### Encapsulation and Abstraction in PHP
- **Encapsulation**: Bundling data and methods that operate on the data into a single unit.
  - Hides the internal state of an object and only exposes the necessary functionality. 
  - Ensures that object properties cannot be accessed directly from outside the class.
  - Getters and setters are used to access and modify the object's properties.
  - Don't just create getters and setters for every private property, ensure that you actually need them.
  - Breaking the encapsulation via PHP reflection API is possible, but it is not recommended, example:
    ```php
    class Person {
        private $name = 'John';
    }

    $person = new Person();
    $reflection = new ReflectionClass($person);
    $property = $reflection->getProperty('name');
    $property->setAccessible(true);
    $property->setValue($person, 'Jane');
    echo $property->getValue($person); // Output: Jane
    ```

- **Abstraction**: Hiding the complex implementation details and showing only the necessary features of an object.
  - You expect an object to perform a task without knowing how it is implemented. You can provide some input and get the output.
  
- **Encapsulation** hides state and **Abstraction** hides implementation details.