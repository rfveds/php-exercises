### Object Cloning and Clone Magic Method in PHP
- Object cloning is creating a copy of an object. An object copy is created by using the `clone` keyword.
- The `__clone()` magic method is called when an object is cloned. You can hook into this method to perform any additional initialization or setup when an object is cloned, for example assign a new ID to the cloned object.
-  The clone keyword performs a shallow copy, meaning it doesn't clone nested objects. For deep cloning, you'll need to manually clone each nested object.