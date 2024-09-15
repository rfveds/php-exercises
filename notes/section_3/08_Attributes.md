### **Attributes**

Feature introduced in PHP 8, which allows structured, machine-readable metadata to be added to declarations like
classes, methods, functions, parameters, properties, and constants. Attributes are an alternative to annotations, which
have been widely used in frameworks like Symfony and Doctrine, but have limitations such as being embedded within
comments and requiring extra parsing.

Attributes provide a built-in, first-class way of embedding metadata directly into PHP code. They offer a cleaner, more
structured, and validated approach compared to annotations. You can access attributes during runtime using the 
**Reflection API**, specifically through the `getAttributes` method.

### Example Workflow:

1. **Syntax**: Attributes are defined with a `#` followed by brackets. Inside the brackets, you specify the attribute
   class and optional constructor arguments. Example:
   ```php
   #[Route('/')]
   public function index() {}
   ```

2. **Creating an Attribute**: The class is created like a normal PHP class but marked with the `#[Attribute]` decorator.
   For example:
   ```php
   #[Attribute]
   class Route {
       public function __construct(public string $path, public string $method = 'GET') {}
   }
   ```

3. **Flags and Restrictions**: Attributes can be restricted to specific declarations like methods or classes using
   the `target` flag, such as `#[Attribute(Attribute::TARGET_METHOD)]`. If you use an attribute in the wrong place, an
   error is thrown when a new instance of the attribute is created.

4. **Repeatable Attributes**: Some attributes, like routing, might need to be used multiple times on a single method.
   You can enable this with the `isRepeatable` flag.

5. **Built-in Attributes**: PHP has built-in attributes like `#[Deprecated]`, and IDEs like PhpStorm provide additional
   ones.

### Key Concepts:

- **Attributes vs. Annotations**: Attributes are integrated into PHP and provide better structure and validation.
- **Reflection API**: Used to retrieve and process attributes at runtime.
- **Extensibility**: You can create complex inheritance structures with attributes to handle various use cases.

### Additional Notes:
- Deprecated mean that the feature is still available but will be removed in future versions.
- First-class means that the feature is a core part of the language and not an external library or framework.
