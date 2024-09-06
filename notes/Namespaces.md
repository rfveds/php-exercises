### Namespaces in PHP
- Namespaces are used to organize code into logical groups and prevent naming conflicts.

### Defining a Namespace
- A namespace is defined using the `namespace` keyword followed by the namespace name.
- The namespace declaration must be the first statement in the file.

### Global Namespace
- If you do not define a namespace, the code is placed in the global namespace.
- The global namespace is represented by a backslash `\`.
- For example, `namespace MyNamespace;` is equivalent to `\MyNamespace`.
- You can access global classes using the backslash prefix.
- For example, `\DateTime` refers to the global `DateTime` class.
- You can also use the `use` keyword to import global classes into the current namespace.
- For example, `use DateTime;` imports the global `DateTime` class.

### Class aliasing
- You can use the `use` keyword to create an alias for a class.
- This is useful when you want to refer to a class by a different name.
- For example, `use MyNamespace\MyClass as MyAlias;` creates an alias `MyAlias` for the `MyClass` class.
- You can then refer to the class using the alias, e.g., `$obj = new MyAlias();`.

### Functions and Constants
- You can also define functions and constants within a namespace.
- For example, `namespace MyNamespace; function myFunction() { ... }`.
- To access a function or constant from another namespace, you can use the fully qualified name, e.g., `MyNamespace\myFunction()`.
- Using backslash prefix, you can access global functions and constants, e.g., `\myGlobalFunction()`.
