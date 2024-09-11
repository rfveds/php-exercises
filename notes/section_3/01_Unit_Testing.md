### PHPUnit

- PHPUnit is a programmer-oriented testing framework for PHP. It is an instance of the xUnit architecture for unit
  testing frameworks.

### Mocking

- ***API Calls***: We don't want to make actual API calls in our tests. We want to mock the API calls.
- ***Email & SMS***: We don't want to send actual emails or SMS in our tests. We want to mock the email and SMS sending.
- ***Database***: We don't want to make actual database calls in our tests. We want to mock the database calls.
- ***Models***: We don't want to make actual model calls in our tests. We want to mock the model calls.

- By default, methods from mocked classes return `null`. We can change this behaviour by using `willReturn()` method.

```php

#### Various notes

- `assertEqual()`: It checks if the two values are equal. Doesn't use strict comparison. May result in false positives.
- `assertSame()`: It checks if the two values are equal and of the same type. Uses strict comparison.