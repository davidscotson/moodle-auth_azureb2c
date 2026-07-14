## 2025-05-14 - Insecure Deserialization in State Handling
**Vulnerability:** The plugin stored additional state data in the database using `serialize()` and later retrieved it using `unserialize()` without restrictions. This could lead to PHP Object Injection if an attacker could influence the stored state data.
**Learning:** Even internal state data should be treated with caution when using `unserialize()`. Moodle's database can sometimes be a vector if other vulnerabilities allow tampering with tables.
**Prevention:** Always use `['allowed_classes' => false]` with `unserialize()` when only basic data types (like arrays or strings) are expected.

## 2025-05-14 - JWT 'none' Algorithm Vulnerability
**Vulnerability:** The JWT decoding logic explicitly allowed the 'none' algorithm in its whitelist. An attacker could provide a forged JWT with `{"alg": "none"}` and a modified payload, which the plugin would accept as valid without any signature verification.
**Learning:** Explicitly whitelisting 'none' in a JWT library is a dangerous pattern that bypasses the primary security mechanism of JWS.
**Prevention:** Remove 'none' from the allowed algorithms list in any JWT implementation unless there is a very specific, well-documented, and secure reason to allow it.
