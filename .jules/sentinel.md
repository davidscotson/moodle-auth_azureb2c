## 2025-05-15 - JWT Signature Bypass via 'none' Algorithm
**Vulnerability:** The JWT decoding logic in `classes/jwt.php` included 'none' in its whitelist of supported algorithms.
**Learning:** Including 'none' allows an attacker to provide an unsigned JWT by setting the `alg` header to `none`. If the code doesn't explicitly verify the signature based on the algorithm (or if it trusts the algorithm in the header), this bypasses integrity checks.
**Prevention:** Always use a strict whitelist of strong cryptographic algorithms (e.g., RS256, HS256) and explicitly disallow the 'none' algorithm in production code. Use a reputable JWT library when possible.
