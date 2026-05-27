## 2025-01-24 - Insecure JWT Algorithm Whitelist and PHP Deserialization
**Vulnerability:** The JWT implementation explicitly allowed the 'none' algorithm in its whitelist, and the login flow used PHP `unserialize()` on state data without restricting allowed classes.
**Learning:** Legacy authentication plugins may include insecure defaults like 'none' for testing or early development that never get removed. `unserialize()` is often used for database state storage without realizing the object injection risks.
**Prevention:** Always remove 'none' from production JWT libraries. Use `['allowed_classes' => false]` as a default for any `unserialize()` call, or preferably use `json_decode()` for state data.
