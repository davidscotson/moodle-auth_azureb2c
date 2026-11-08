## 2025-05-14 - [HIGH] Insecure Unserialize Hardening
**Vulnerability:** Insecure use of PHP `unserialize()` on database-stored state data in `classes/loginflow/authcode.php`.
**Learning:** Data stored in the `auth_azureb2c_state` table was being deserialized without restricting allowed classes, potentially allowing PHP Object Injection if an attacker could influence the state data (e.g., via a previous step in the flow or database access).
**Prevention:** Always pass `['allowed_classes' => false]` to `unserialize()` when the expected data type is a primitive or an array, especially when dealing with data that could be influenced by external sources.
