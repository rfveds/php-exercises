### Serializing and Deserializing in PHP
- `serialize()` and `unserialize()` are used to convert PHP objects into a storable string and vice versa.
- `serialize()` returns a string containing a byte-stream representation of any value that can be stored in PHP.
- `unserialize()` takes a single serialized variable and converts it back into a PHP value.
- Methods of the object are not serialized.
- Unserialization creates a new instance of the object. It points to new memory location.
- Untrusted data should not be unserialized.
- `__sleep()` is called before serialization. It returns an array of all the properties that should be serialized.
- `__wakeup()` is called after unserialization. It is used to reestablish any database connections that may have been lost during serialization and perform other reinitialization tasks.
- `__serialize()` is similar to `__sleep()`. The difference is that `__sleep()` returns an array of the names of all the properties that should be serialized,
 whereas `__serialize()` returns an array of the data that should be serialized and can contain additional data, or you can modify them.
- `__serialize()` takes precedence over `__sleep()` similar to `__unserialize()` over `__wakeup()`.
- `__unserialize()` method takes the data that was serialized in method argument.