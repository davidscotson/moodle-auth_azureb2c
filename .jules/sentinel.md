## 2025-01-24 - Login CSRF and Insecure Deserialization in auth_azureb2c
**Vulnerability:** Login CSRF and Potential Object Injection via `unserialize`.
**Learning:** The OAuth2 `state` parameter was being used but not verified against the user's Moodle session key, allowing Login CSRF. Additionally, `unserialize` was used on data retrieved from the database without restricting allowed classes.
**Prevention:** Always verify the `state` parameter includes a session-bound secret (like `sesskey()`). When using `unserialize`, use `['allowed_classes' => false]` unless class instantiation is explicitly required.
