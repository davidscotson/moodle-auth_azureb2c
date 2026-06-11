
## 2025-05-15 - JWT and Serialization Hardening
**Vulnerability:** The JWT library supported the 'none' algorithm, and a state parameter was unserialized without class restrictions.
**Learning:** Default implementations of JWT and PHP serialization often prioritize compatibility over security, allowing for algorithm confusion and object injection attacks.
**Prevention:** Explicitly whitelist cryptographic algorithms for JWT and use `['allowed_classes' => false]` for `unserialize()` when only data structures are expected.
