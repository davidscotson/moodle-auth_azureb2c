# Sentinel's Security Journal

## 2025-06-01 - JWT 'none' Algorithm Support
**Vulnerability:** The JWT decoding implementation in `classes/jwt.php` included `'none'` in the list of supported algorithms.
**Learning:** Supporting the `'none'` algorithm allows an attacker to bypass authentication by providing a JWT with `{"alg": "none"}` in the header and no signature. The application would then accept the claims (like user ID) without any cryptographic verification.
**Prevention:** Never include `'none'` in the whitelist of supported JWS algorithms. Standardize on secure algorithms like `RS256` or `HS256` and strictly enforce them.
