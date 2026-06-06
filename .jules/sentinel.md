## 2026-06-06 - JWT 'none' Algorithm Support
**Vulnerability:** The `jwt` class explicitly allowed the `none` algorithm in its whitelist.
**Learning:** This is a common but dangerous default in some JWT libraries or custom implementations, allowing signature bypass.
**Prevention:** Always remove 'none' from the allowed algorithms list unless there is a very specific, secured use case for unsigned tokens.

## 2026-06-06 - Insecure PHP Deserialization
**Vulnerability:** `unserialize()` was used on `additionaldata` from the database without restricting allowed classes.
**Learning:** Even if the data comes from the database, if that data was originally influenced by external input (like OAuth state), it can lead to PHP Object Injection if an attacker can manipulate the stored state.
**Prevention:** Always use `['allowed_classes' => false]` with `unserialize()` unless you specifically need to reconstruct objects, and even then, use a strict whitelist of classes.

## 2026-06-06 - CI Failure: PHP 8.3 Segfault (Signal 11)
**Vulnerability:** Not a security vulnerability per se, but a critical stability issue. Missing property declarations for dynamic properties in classes/tests can cause PHP 8.3 to segfault during PHPUnit execution.
**Learning:** PHP 8.2+ deprecates dynamic properties. While normally a warning, in certain test environments or complex inheritance chains, this can escalate to a process signal 11 (Segmentation Fault).
**Prevention:** Always explicitly declare all class properties, including those in mock or test classes.
