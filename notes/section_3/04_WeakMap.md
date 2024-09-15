### WeakMap in PHP

### Summary of WeakMap in PHP

A **WeakMap** is a special kind of map (or dictionary) introduced in PHP that allows you to use objects as keys. Unlike
standard maps, where keys are usually strings or numbers, a WeakMap is designed to handle memory management more
efficiently when using objects as keys. Here are the key points to understand about WeakMap:

1. **Weak References**: WeakMap uses weak references, meaning that it does not prevent an object from being garbage
   collected. If an object used as a key in a WeakMap no longer has any strong references elsewhere, it will be garbage
   collected, and the corresponding entry in the WeakMap will be removed.

2. **Usage and Benefits**:

- **Caching**: WeakMaps are useful for caching data derived from objects without increasing their lifetime
  unnecessarily.
- **Memory Management**: They help prevent memory leaks in long-running processes by allowing objects to be garbage
  collected when no longer needed.
- **Associating Additional Data**: WeakMaps can be used to associate additional data with objects without modifying the
  objects themselves.

3. **Behavior and Limitations**:

- **Keys Must Be Objects**: You can only use objects as keys in a WeakMap. Trying to use a non-object key (e.g., a
  string or integer) will throw an exception.
- **Exception Handling**:
    - Accessing a non-existing key results in an exception.
    - You cannot append elements to a WeakMap using array bracket syntax (`$map[] = ...`).
- **No Hard References**: Unlike `SPLObjectStorage` (another PHP data structure), WeakMap does not hold a "hard"
  reference to objects. This means it does not prevent the object from being destroyed when it goes out of scope or is
  unset.

4. **Comparison with SPLObjectStorage**:

- **SPLObjectStorage**: This is a "hard" map that creates a strong reference to the object. If an object is used as a
  key in `SPLObjectStorage`, it will not be garbage collected as long as it remains in the storage, potentially causing
  memory leaks.
- **WeakMap**: Provides better memory management by using weak references, ensuring objects are garbage collected when
  they are no longer needed.

5. **Practical Example**:

- Creating a WeakMap: `$map = new WeakMap();`
- Adding an entry with an object key: `$map[$object] = ['additional' => 'data'];`
- If the object is unset or goes out of scope, it will be removed from the WeakMap automatically.

Overall, WeakMap is a powerful feature in PHP for advanced memory management scenarios, especially when dealing with
caching or associating additional data with objects in a way that doesn't prevent garbage collection.