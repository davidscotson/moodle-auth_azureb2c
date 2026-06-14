## 2025-05-15 - JWT Signature Bypass and PHP Object Injection Hardening

**Vulnerability:** The JWT library explicitly whitelisted the 'none' algorithm, allowing signature bypass. Additionally, `unserialize()` was used on database-stored state data without class restrictions, risking PHP Object Injection.

**Learning:** Standard libraries and legacy code may include insecure defaults or follow outdated patterns (like allowing 'none' for debugging or missing the `allowed_classes` option in `unserialize`). In Moodle plugins, state data passed back from IdPs is a high-risk vector if not properly hardened.

**Prevention:** Always remove 'none' from JWT algorithm whitelists in production code. Use `['allowed_classes' => false]` for all `unserialize()` calls unless object instantiation is strictly necessary and the source is trusted.
