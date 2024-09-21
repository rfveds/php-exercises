### PHP Enums (Introduced in PHP 8.1)

#### What is an Enum?

An **enum** (enumeration) is a special data type that allows a variable to be one of a predefined set of constants.
Enums are useful when you want to define a variable that can have only a fixed set of possible values.

In PHP, enums are implemented as classes, providing more flexibility than traditional enumerations in other languages.
They can have methods, constants, and can implement interfaces.

#### Types of Enums

1. **Pure Enums**: Basic enum with no associated values.
2. **Backed Enums**: Enum with associated values (either strings or integers).

---

### 1. Pure Enum Example

```php
enum Status {
    case PENDING;
    case APPROVED;
    case REJECTED;
}

// Usage:
$status = Status::PENDING;

if ($status === Status::APPROVED) {
    echo "Approved!";
}
```

- **case**: Defines an enum constant (referred to as cases).
- You can access enum cases using `EnumName::CaseName`.

---

### 2. Backed Enum Example

Backed enums associate each case with a scalar value (either `int` or `string`).

```php
enum OrderStatus: string {
    case PENDING = 'pending';
    case COMPLETED = 'completed';
    case CANCELLED = 'cancelled';
}

// Usage:
$status = OrderStatus::COMPLETED;
echo $status->value;  // Output: completed
```

- The `OrderStatus::COMPLETED->value` gives the associated value (`completed`).
- You can also retrieve enum cases by their value using `OrderStatus::from($value)`.

```php
$status = OrderStatus::from('completed');  // Output: OrderStatus::COMPLETED
```

---

### 3. Enum Methods

You can define methods in enums to add more functionality.

```php
enum TrafficLight {
    case RED;
    case YELLOW;
    case GREEN;

    public function isSafeToGo(): bool {
        return $this === self::GREEN;
    }
}

// Usage:
$light = TrafficLight::RED;

if (!$light->isSafeToGo()) {
    echo "Stop!";
}
```

- Enums can contain methods, making them more powerful than simple enumerations.

---

### 4. Common Enum Functions

- **Cases Listing**: You can get all enum cases using the `cases()` method.

```php
$cases = Status::cases();
foreach ($cases as $case) {
    echo $case->name;  // Outputs: PENDING, APPROVED, REJECTED
}
```

- **`from()` and `tryFrom()`**: Backed enums allow you to retrieve an enum by its value:
    - `from($value)` throws an exception if the value is invalid.
    - `tryFrom($value)` returns `null` if the value is invalid.

---

### Key Points

- Enums are classes, allowing them to implement interfaces, use traits, and include constants.
- Enums are a type-safe way to manage a predefined set of constant values, replacing traditional use of constants.

---

### Example: Enum with Interface

```php
interface Printable {
    public function print(): void;
}

enum Color implements Printable {
    case RED;
    case BLUE;
    case GREEN;

    public function print(): void {
        echo $this->name;
    }
}

// Usage:
$color = Color::BLUE;
$color->print();  // Output: BLUE
```

Enums in PHP offer a clean and type-safe way to define constants, with the added benefit of class-like behavior.

### Notes
- traits not supported in enums
- inheritance not supported in enums