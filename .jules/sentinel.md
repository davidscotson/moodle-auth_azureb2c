## 2023-03-07 - JWT and Serialization Hardening
**Vulnerability:** Insecure PHP serialization and JWT algorithm confusion.
**Learning:** The plugin was using `unserialize` on data stored in the database which could be influenced by external responses, and the JWT library whitelisted 'none' algorithm.
**Prevention:** Always use `['allowed_classes' => false]` with `unserialize` when dealing with potentially untrusted data. Explicitly whitelist only secure algorithms for JWT verification.
