### Summary
PHP sessions and cookies help retain information across requests, but must be managed carefully to avoid errors like "headers already sent."

### Highlights
- Sessions and cookies store information across requests.
- Starting sessions after output leads to warnings.
- Output buffering delays content display.
- Sessions persist until the browser closes or cookie expires.
- Cookies must be set before any output.
- Sensitive data should not be stored in cookies.
- Cookie expiration can be controlled via timestamps.

### Key Insights
- **Sessions vs. Cookies**: Sessions are server-side and expire when the browser closes, while cookies are client-side and can persist until their expiration date, making them suitable for different use cases.
- **Error Handling**: The "headers already sent" warning can be avoided by ensuring that `session_start()` and `setcookie()` are called before any output is sent to the browser.
- **Output Buffering**: By default, output buffering is enabled, allowing PHP to hold output until the script completes. This can mask certain errors but should be managed carefully.
- **Session Management**: Session data is stored in a unique session ID cookie, which allows tracking across requests. Developers can manipulate session data using the `$_SESSION` superglobal.
- **Cookie Security**: Cookies are vulnerable to attacks, so sensitive information should never be stored in them. When necessary, data should be encrypted or hashed.
- **Expiration Control**: Developers can set cookie expiration times to control how long cookies persist, which is crucial for session management and user experience.
- **Best Practices**: Always start sessions and set cookies at the beginning of scripts to ensure proper functionality and avoid common pitfalls in PHP development.

### Example
```php
<?php
// Start a session
session_start();

setcookie("user", "John Doe", time() + 3600, "/");
?>
```