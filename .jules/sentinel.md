## 2025-05-15 - JWT 'none' Algorithm Vulnerability
**Vulnerability:** The JWT library in `classes/jwt.php` previously allowed the 'none' algorithm in its whitelist.
**Learning:** Even if a back-channel is used, whitelisting 'none' in a generic JWT decode function can lead to signature bypass if any part of the application relies on it for security decisions without further checks.
**Prevention:** Never include 'none' in the list of supported JWT algorithms unless there is a very specific, documented, and secure use case.

## 2025-05-15 - PHP Object Injection via Unserialize
**Vulnerability:** The `unserialize()` call in `classes/loginflow/authcode.php` did not restrict allowed classes.
**Learning:** Serialized data stored in the database (like OAuth2 state) can be a target for PHP Object Injection if it's ever tampered with or if the database is compromised.
**Prevention:** Always use `['allowed_classes' => false]` with `unserialize()` unless objects are explicitly expected and needed.
