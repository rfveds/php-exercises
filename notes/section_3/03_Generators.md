### Generators in PHP
- Generators are a special type of iterator that simplifies the process of creating iterators.
- They allow you to iterate over a set of data without needing to build an array in memory.
- Generators are useful when you need to iterate over a large set of data, but you don't need to store all the data in memory at once.
- Generators are defined using the `yield` keyword.
- The `yield` keyword is used to return a value from a generator function.
- When a generator function is called, it returns a generator object that can be used to iterate over the data.
- Generators are useful for creating iterators that are memory-efficient and easy to use
- Example:
```php
function lazyRange($start, $end, $step = 1): Generator {
    for ($i = $start; $i <= $end; $i += $step) {
        yield $i;
    }
}

$num = lazyRange(1, 10, 2);
echo $num->current(); // 1
    
$num->next();
echo $num->current(); // 3 
```
- In some cases Generator can be useful when fetching a lot of data from database, and you don't want to store all data in memory at once.