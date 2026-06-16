## 2025-06-16 - JWT and Unserialize Hardening
**Vulnerability:** Supported 'none' algorithm in JWT library and unhardened `unserialize()` call on database-sourced state data.
**Learning:** Even if data is produced by the application, hardening `unserialize` with `allowed_classes => false` is a critical defense-in-depth measure against PHP Object Injection if the storage or generation logic is compromised. Allowing 'none' in JWT libraries is a high-risk default that should be avoided.
**Prevention:** Always restrict `unserialize` to non-objects unless explicitly required, and maintain a strict whitelist of strong cryptographic algorithms for JWT processing.
