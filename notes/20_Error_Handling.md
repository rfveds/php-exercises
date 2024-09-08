### OOP Error Handling In PHP - Exceptions & Try Catch Finally Blocks
- **Error Handling** is the process of catching errors and exceptions in a program and taking appropriate action to handle them.
- Exception is object of some exception class that is thrown when an error occurs.
- `throw` keyword is used to throw an exception manually, or it can be thrown automatically by PHP when an error occurs.
- Example:
  - ```php
    <?php
    function divide($num1, $num2) {
        if($num2 == 0) {
            throw new Exception("Division by zero is not allowed.");
        }
        return $num1 / $num2;
    }
    try {
        echo divide(10, 0);
    } catch(Exception $e) {
        echo "Error: ".$e->getMessage();
    }
    ?>
    ```
- Exception class vs Error class
    - Exception class is used for exception that includes both user-defined and built-in exceptions.
    - Error class is used for fatal errors and exceptions that are thrown by PHP.
- Both Exception and Error classes are derived from the Throwable interface.
- You can create your own exception class by extending the Exception class.
- Example:
  - ```php
    <?php
    class CustomException extends Exception {
       protected $message = "Custom exception message.";
    }
    $email = "someone@example...com";
    try {
        if(filter_var($email, FILTER_VALIDATE_EMAIL) === FALSE) {
            throw new CustomException($email);
        }
    } catch(CustomException $e) {
        echo "Error: ".$e->getMessage() . "<br>" . $e->getLine() . "<br>" . $e->getFile() . "<br>";
    } finally {
        echo "This is finally block.";
    }
    ?>
    ```
- **Try Catch Finally Blocks**
- `try` block is used to enclose the code that may throw an exception.
- `catch` block is used to catch the exception thrown by the `try` block.
- `finally` block is used to execute the code that should always run, regardless of whether an exception is thrown or not.
  - If you are returning a value from a `try` block, then the `finally` block will execute before the return statement.
  - If you are also returning a value from the `finally` block, the value returned by the `finally` block will override the value returned by the `try` block.
- You can use multiple `catch` blocks to catch different types of exceptions.
- You can use `|` operator to catch multiple exceptions in a single `catch` block, like this:
  - ```php
    catch(Exception1 | Exception2 | Exception3 $e) {
        // code to handle exception
    }
    ```
- Global exception handler can be set using `set_exception_handler()` function.
  - Example:
    - ```php 
        <?php
        function customExceptionHandler(\Throwable $e) {
            echo "Exception caught: ".$e->getMessage();
        }
        set_exception_handler("customExceptionHandler");
        echo 3 / 0; // Division by zero
        // Output: Exception caught: Division by zero
        ?>
        ```
    - It is used to set a user-defined function to handle all uncaught exceptions, that bubble up to the top of the call stack.
- Defining exception message as static function:
  - ```php
    <?php
    class CustomException extends Exception {
        public static function errorMessage() {
            return "Custom exception message.";
        }
    }
    try {
        throw new CustomException();
    } catch(CustomException $e) {
        echo "Error: ".CustomException::errorMessage();
    }
    ?>
    ```
    - It can be useful when you want to define a common error message for all instances of the exception class.