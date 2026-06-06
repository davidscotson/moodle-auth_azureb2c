## 2025-05-15 - JWT 'none' Algorithm Support
**Vulnerability:** The `jwt` class explicitly allowed the `none` algorithm in its whitelist.
**Learning:** This is a common but dangerous default in some JWT libraries or custom implementations, allowing signature bypass.
**Prevention:** Always remove 'none' from the allowed algorithms list unless there is a very specific, secured use case for unsigned tokens.

## 2025-05-15 - Insecure PHP Deserialization
**Vulnerability:** `unserialize()` was used on `additionaldata` from the database without restricting allowed classes.
**Learning:** Even if the data comes from the database, if that data was originally influenced by external input (like OAuth state), it can lead to PHP Object Injection if an attacker can manipulate the stored state.
**Prevention:** Always use `['allowed_classes' => false]` with `unserialize()` unless you specifically need to reconstruct objects, and even then, use a strict whitelist of classes.
