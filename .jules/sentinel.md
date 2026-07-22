## 2026-03-05 - JWT None Algorithm Bypass and Insecure State Unserialization
**Vulnerability:**
1. The `jwt` decoding utility supported the 'none' algorithm in JWT signature headers, allowing potential signature bypasses when processing unverified identity or user tokens.
2. The authentication callback in `authcode.php` performed PHP `unserialize` on state data stored in the database without disabling class instantiation, leaving the application open to potential PHP Object Injection (POI) if the state could be controlled.

**Learning:**
1. Supported algorithm whitelists in JWT parsers should never include 'none' unless signature-less contexts are explicitly required and verified out-of-band.
2. Even database-originated serialized state payloads should be unserialized with `allowed_classes` disabled (`false`) if only plain structures (arrays or scalars) are expected.

**Prevention:**
1. Remove 'none' from `$jwsalgs` whitelist array in `jwt.php` and enforce cryptographic/signature checks.
2. Pass `['allowed_classes' => false]` as the second argument to all `unserialize` invocations processing state or request parameters.
