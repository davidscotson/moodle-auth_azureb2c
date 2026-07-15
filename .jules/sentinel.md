## 2025-05-15 - JWT Signature Bypass via 'none' Algorithm
**Vulnerability:** The JWT decoding logic in `classes/jwt.php` included 'none' in its whitelist of supported algorithms.
**Learning:** Including 'none' allows an attacker to provide an unsigned JWT by setting the `alg` header to `none`. If the code doesn't explicitly verify the signature based on the algorithm (or if it trusts the algorithm in the header), this bypasses integrity checks.
**Prevention:** Always use a strict whitelist of strong cryptographic algorithms (e.g., RS256, HS256) and explicitly disallow the 'none' algorithm in production code. Use a reputable JWT library when possible.

## 2025-05-15 - PHP Object Injection via unserialize()
**Vulnerability:** The B2C state additional data was being unserialized without restrictions in `classes/loginflow/authcode.php`.
**Learning:** Unserialize can be used to instantiate arbitrary classes if they are present in the environment, leading to PHP Object Injection.
**Prevention:** Always use `['allowed_classes' => false]` when unserializing data from potentially untrusted sources (like a database record that could have been tampered with or influenced by external input).
