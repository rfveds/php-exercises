### PHPUnit

- PHPUnit is a programmer-oriented testing framework for PHP. It is an instance of the xUnit architecture for unit
  testing frameworks.

### Mocking

- ***API Calls***: Mock API calls in tests.
- ***Email & SMS***: Mock email and SMS sending in tests.
- ***Database***: Mock database calls in tests.
- ***Models***: Mock model calls in tests.

- By default, methods from mocked classes return `null`. We can change this behaviour by using `willReturn()` method.

```php

#### Various notes

- `assertEqual()`: It checks if the two values are equal. Doesn't use strict comparison. May result in false positives.
- `assertSame()`: It checks if the two values are equal and of the same type. Uses strict comparison.