### DateTime Object in PHP
- The DateTime object is a class that allows you to work with date and time in PHP.
- Creating a DateTime object is simple, you just need to call the DateTime class and pass the date and time as a string.
Example:
```php
$date = new DateTime('2021-10-21 12:00:00');
```
- You can also create a DateTime object using the current date and time by calling the `now()` method.
Example:
```php
$date = new DateTime('now');
```
- DateTimeZone class is used to set the timezone for the DateTime object.
- Timezone can be set by passing the timezone as a string to the DateTimeZone class.
Example:
```php
$date = new DateTime('now', new DateTimeZone('Asia/Kolkata')); 
$date->setTimezone(new DateTimeZone('America/New_York'));
```
- You can format the date and time using the `format()` method.
Example:
```php
echo $date->format('Y-m-d H:i:s');
```
- You can also modify the date and time using the `modify()` method.
Example:
```php
$date->modify('+1 day');
```
- You can compare two DateTime objects using the `diff()` method.
Example:
```php
$date1 = new DateTime('2021-10-21 12:00:00');
$date2 = new DateTime('2021-10-22 12:00:00');
$diff = $date1->diff($date2);
echo $diff->format('%R%a days');  // Output: +1 days
```
- DateTime::createFromFormat() method is used to create a DateTime object from a string format. Useful when dealing with different date format ex. european and american.
Example:
```php
$date = DateTime::createFromFormat('Y-m-d H:i:s', '2021-10-21 12:00:00');
```
- diff() method returns a DateInterval object which can be used to get the difference between two dates.
  - DateInterval object has properties like y, m, d, h, i, s which can be used to get the difference in years, months, days, hours, minutes, and seconds.
  - "invert" property is used to check if the difference is negative.
  - format() method is used to format the difference.
  - Example:
  - ```php
    $date1 = new DateTime('2021-10-21 12:00:00');
    $date2 = new DateTime('2021-10-22 12:00:00');
    $diff = $date1->diff($date2);
    echo $diff->format('%Y years %M months %D days %H hours %I minutes %S seconds'); // Output: 0 years 0 months 1 days 0 hours 0 minutes 0 seconds
    ```
- DateTimeImmutable class is used to create an immutable DateTime object. 
  - Immutable objects are read-only and cannot be modified. If you modify date, new object is created, without need to clone.
- DatePeriod class is used to iterate over a range of dates.
  - It takes a start date, interval, and end date as arguments.
  - Example:
  - ```php
    $start = new DateTime('2021-10-01');
    $interval = new DateInterval('P1D'); // 1 day interval
    $end = new DateTime('2021-10-10');
    $period = new DatePeriod($start, $interval, $end);
    foreach ($period as $date) {
        echo $date->format('Y-m-d') . PHP_EOL; 
    }
    ```
  It will output dates from 2021-10-01 to 2021-10-10.