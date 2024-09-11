### Traversable Interface
- The `Traversable` interface is implemented by all classes that can be used in a `foreach` loop.
### Iterator Interface
- The `Iterator` interface is used to iterate over an object.
```php

class MyIterator implements Iterator {
    public __construct(private array $data) {    
    }
    
    public function current() {
        return current($this->data);
    }
    
    public function key() {
        return key($this->data);
    }
    
    public function next() {
        next($this->data);
    }
    
    public function rewind() {
        reset($this->data);
    }
    
    public function valid() {
        return current($this->data) !== null;
    }
    
    
}
```
### IteratorAggregate Interface
```php
class MyCollection implements IteratorAggregate {
    public __construct(private array $data) {    
    }
    
    public function getIterator() {
        return new ArrayIterator($this->data);
    }
}
```