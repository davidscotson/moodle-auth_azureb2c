## 2025-05-14 - Security Hardening (JWT, Serialization, Direct Access)
**Vulnerability:** Supported 'none' algorithm in JWT decoding, allowed class instantiation in 'unserialize' of state data, and missing direct access protection in 'db/events.php'.
**Learning:** Legacy code often carries support for insecure defaults like the 'none' JWT algorithm or unrestricted PHP serialization, which can lead to critical bypasses or RCE. Standard Moodle direct-access checks are also easily overlooked in non-class files.
**Prevention:** Explicitly whitelist JWT algorithms (excluding 'none'), disable class instantiation in 'unserialize' by default, and religiously apply the 'MOODLE_INTERNAL' check to all logic files.
