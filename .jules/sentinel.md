## 2025-05-15 - JWT 'none' Algorithm and Insecure Deserialization
**Vulnerability:** The JWT implementation explicitly whitelisted the 'none' algorithm, and state data was unserialized without disabling class instantiation.
**Learning:** Custom JWT implementations often copy-paste standard algorithm lists without considering the security implications of 'none'. Similarly, `unserialize` is often used for simple data structures without realizing it can be a vector for PHP Object Injection.
**Prevention:** Always remove 'none' from JWT algorithm whitelists. Use `['allowed_classes' => false]` with `unserialize()` when only primitive data is expected, or better yet, use `json_decode()`.
