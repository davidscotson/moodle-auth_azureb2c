## 2025-05-15 - JWT Algorithm Confusion and PHP Object Injection Hardening
**Vulnerability:** The JWT decoding logic whitelisted the 'none' algorithm, and the `unserialize` function was used on stored state data without restricting class instantiation.
**Learning:** Even if data is stored in the database (like OAuth2 state), it should be treated as untrusted upon retrieval if it was originally derived from or associated with external request parameters. Whitelisting 'none' in JWT is a common but high-impact oversight.
**Prevention:** Always explicitly exclude 'none' from JWT algorithm whitelists. Use `['allowed_classes' => false]` as a default for all `unserialize` calls unless object hydration is strictly necessary and the source is fully trusted.
