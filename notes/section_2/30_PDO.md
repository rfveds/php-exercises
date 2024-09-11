### PDO PHP Data Objects - Data Access Layer

- dsn: Data Source Name - database connection string (e.g., `mysql:host=localhost;dbname=testdb`)
- PDOException can expose sensitive information, so handle exceptions carefully.

#### Running Queries

```php
try {
$db = new PDO('mysql:host=localhost;dbname=test', $user, $pass);

$stmt = "SELECT * FROM users";
foreach ($db->query($stmt) as $user) {

    echo $user['name'] . "\n";
}
} catch (PDOException $e) {
    throw new \PDOException($e->getMessage(), (int)$e->getCode());
}
```

- `PDO::FETCH_ASSOC` - fetches an associative array.
- `PDO::FETCH_CLASS` - fetches a new instance of the specified class, if property doesn't exist, it will be created via
  magic methods.
- `PDO::FETCH_OBJ` - fetches an object.

#### Prepared Statements

- Prepare query once and execute multiple times with different parameters.
- Prevents SQL injection attacks (malicious SQL queries).

```php
$stmt = $db->prepare("SELECT * FROM users WHERE name = :name");

$stmt->bindParam(':name', $name); // bind by reference
$stmt->bindValue(':name', $name); // bind values
$stmt->execute(); // execute query
// OR
$stmt->execute(['name' => 'John Doe']); // named parameters

$user = $stmt->fetch(PDO::FETCH_ASSOC);
```

#### Emulating Prepared Statements

- `PDO::ATTR_EMULATE_PREPARES` - enables/disables emulation of prepared statements.

#### Transactions

***Transactions*** are used to ensure that a series of database operations are executed in a safe and reliable manner.
They provide the following benefits:

- Atomicity: Ensures that all operations within the transaction are completed successfully. If any operation fails, the
  entire transaction is rolled back, leaving the database in its previous state.
- Consistency: Ensures that the database remains in a consistent state before and after the transaction.
- Isolation: Ensures that transactions are isolated from each other, preventing concurrent transactions from interfering
  with each other.
- Durability: Ensures that once a transaction is committed, it will remain so, even in the event of a system failure.

```php
<?php

try {
    $db = new PDO('mysql:host=localhost;dbname=test', $user, $pass);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); 
} catch (PDOException){
}
   
try {
    // Begin the transaction
    $db->beginTransaction();

    // Execute multiple queries
    $db->exec("INSERT INTO users (name, email, password, created_at) VALUES ('Jane Doe', 'jane@mail.com', 'password', NOW())");
    $db->exec("INSERT INTO invoices (user_id, amount) VALUES (LAST_INSERT_ID(), 150.00)");

    // Commit the transaction
    $db->commit();
} catch (Throwable $e) {
    // Rollback the transaction if something failed
    if ($db->inTransaction()){
        $db->rollBack();
    }
    echo "Failed: " . $e->getMessage();
}
?>
```