## 2025-01-24 - Insecure Deserialization in Auth State
**Vulnerability:** The `unserialize()` function was used on data from the `auth_azureb2c_state` table without restricting allowed classes, potentially allowing PHP Object Injection.
**Learning:** Even internal database-stored state data should be treated as untrusted if it originates from external flow parameters or can be manipulated.
**Prevention:** Always use `['allowed_classes' => false]` with `unserialize()` unless object instantiation is explicitly required and the source is fully trusted.
