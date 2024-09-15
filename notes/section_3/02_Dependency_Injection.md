### Dependency Injection in PHP

In software engineering, dependency injection is a programming technique in which an object or function receives other
objects or functions that it requires, as opposed to creating them internally. Dependency injection aims to separate the
concerns of constructing objects and using them, leading to loosely coupled programs. The pattern ensures that
an object or function that wants to use a given service should not have to know how to construct those services.
Instead, the receiving 'client' (object or function) is provided with its dependencies by external code (an 'injector'),
which it is not aware of. Dependency injection makes implicit dependencies explicit and helps solve the following
problems:
- How can a class be independent from the creation of the objects it depends on?
- How can an application, and the objects it uses support different configurations?

#### Dependency Injection Containers
- Class that has information about how to construct other classes.
- PSR-11: Container Interface

#### Notes
- ***ReflectionClass***: The ReflectionClass class reports information about a class.