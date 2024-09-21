### Doctrine

- ORM (Object-Relational Mapping) library for PHP that provides a way to interact with databases using objects.
- DBAL (Database Abstraction Layer) provides an abstraction layer for database connections.
- Entities
- Data Mapper & Active Record Patterns

#### 1. **ORM (Object-Relational Mapping)**

- **Definition**: Doctrine's ORM is a library that provides a way to map PHP objects to database tables, allowing
  developers to interact with databases using objects instead of SQL queries.
- **Features**:
    - Supports multiple database systems (MySQL, PostgreSQL, SQLite, etc.).
    - Automatically handles relationships between tables using object references (e.g., One-to-One, One-to-Many,
      Many-to-Many).
    - Provides mechanisms for querying and manipulating data using a high-level API.
    - Can generate SQL queries based on object operations, abstracting SQL writing.
- **Advantages**:
    - Simplifies data access and manipulation, making the code more maintainable.
    - Reduces boilerplate code by automating the mapping between objects and database schemas.
- **Use Cases**: Ideal for applications where business logic is strongly tied to object models and where writing complex
  SQL manually would be cumbersome.

#### 2. **DBAL (Database Abstraction Layer)**

- **Definition**: DBAL is a standalone database abstraction layer that provides an API for executing SQL queries and
  interacting with the database in a more flexible and portable manner than PDO (PHP Data Objects).
- **Features**:
    - Cross-database portability: Abstracts different SQL dialects to ensure the same PHP code can run on multiple
      database systems.
    - Connection pooling, transaction management, and schema management.
    - Supports prepared statements, query building, and database schema introspection.
- **Advantages**:
    - Allows developers to switch databases with minimal code changes.
    - Provides a powerful API for managing database connections and schemas without being tied to ORM.
- **Use Cases**: When you need more control over SQL queries and database interactions but don't need full ORM
  functionality.

#### 3. **Entities**

- **Definition**: Entities are PHP objects that represent rows in a database table. Each property of the entity
  corresponds to a column in the table.
- **Key Concepts**:
    - **Attributes**: Metadata can be added to entity classes using annotations to map them to tables and define
      relationships between entities.
    - **Lifecycle Hooks**: Doctrine allows for lifecycle callbacks that can execute specific methods on entities during
      events like prePersist, postPersist, etc.
- **Example**:
  ```php
  #[Entity]
  class User {
      #[Id, GeneratedValue, Column(type: 'integer')]
      private $id;
      
      #[Column(type: 'string')]
      private $name;
  }
  ```
- **Advantages**:
    - Abstracts database tables and rows into objects, making data management simpler.
    - Allows defining relationships between objects (i.e., associations between entities).
- **Use Cases**: Representing business models in PHP where each object instance corresponds to a database record.

#### 4. **Migration & Schema Management**

- **Migration**: The process of managing database schema changes over time, such as creating tables, adding columns,
  etc.
- **Doctrine Migrations**: A library that provides a way to manage database schema changes using PHP classes called
  migrations.
- **Key Features**:
    - **Version Control**: Each migration is a versioned PHP class that represents a schema change.
    - **Up & Down Methods**: Each migration class has `up` and `down` methods to apply and revert the schema changes.
    - **Command-Line Interface**: Provides CLI commands to generate, execute, and revert migrations.
- **Advantages**:
    - Ensures consistent database schema changes across different environments.
    - Allows for versioning and tracking of schema changes over time.
- **Use Cases**: When working on projects where database schema changes are frequent and need to be managed systematically.

#### 5. **Data Mapper & Active Record Patterns**

- **Data Mapper Pattern**:
    - **Definition**: A design pattern where the data access logic is separated from the business logic. The ORM layer
      is responsible for transferring data between objects and the database.
    - **Key Characteristics**:
        - The entities are plain PHP objects (POPOs) with no knowledge of the database or persistence logic.
        - The ORM (Doctrine in this case) manages the persistence and retrieval of entities.
    - **Advantages**:
        - Clean separation between business logic and database logic.
        - Easier to maintain and test.
    - **Doctrine's Role**: Doctrine implements the Data Mapper pattern, allowing for flexibility and reducing tight
      coupling between objects and the database.

- **Active Record Pattern**:
    - **Definition**: A design pattern where an object directly manages its own persistence logic (e.g., saving itself
      to the database, finding records, etc.).
    - **Key Characteristics**:
        - Entities have methods for database operations (e.g., `save()`, `find()`, etc.).
        - Tighter coupling between the object and the database.
    - **Advantages**:
        - Simpler to understand and use in small applications.
        - Combines data and behavior in a single entity class.
    - **Doctrine's Role**: Doctrine does not follow the Active Record pattern as it decouples database logic from entity
      objects.

#### Comparison:

- **Data Mapper** (used by Doctrine):
    - Separation of concerns (entities are unaware of persistence).
    - More complex but flexible for large systems.
- **Active Record**:
    - Simpler, but less flexible (entities handle their own persistence).
    - Better for small projects but harder to scale.

These notes give a detailed overview of Doctrine's core components and its application of design patterns in managing
data in PHP projects.