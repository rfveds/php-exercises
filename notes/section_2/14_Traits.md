### Traits in PHP
- Traits are a mechanism for code reuse in single inheritance languages like PHP.
- A trait is similar to a class, but it is intended to group functionality in a fine-grained and consistent way.
- Traits are declared with the `trait` keyword.
- A class can use multiple traits by using the `use` keyword.
- Traits can not be instantiated on their own.
- Traits can be created from other traits.
- Properties in from traits can not be redefined in the class unless they are fully compatible.
#### Precedence and Overriding
- Order of precedence:
  1. The current class methods override the trait methods.
  2. The trait overrides the inherited methods.
- If two traits have a method with the same name, a fatal error occurs.
  - To resolve this conflict, you can use the `insteadof` and `as` operators.
  - The `insteadof` operator is used to exclude a method from a trait.
  - The `as` operator is used to alias a method from a trait.
  - Visibility access can also be changed using the `as` operator.

