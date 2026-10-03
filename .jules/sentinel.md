## 2025-05-21 - JWT Signature Bypass via Unsigned Algorithm Whitelisting
**Vulnerability:** The `jwt::decode` method included `'none'` in its `$jwsalgs` whitelist array, permitting unsigned JWT tokens to bypass signature verification.
**Learning:** Hardcoded algorithm whitelists in custom JWT implementation classes can inadvertently include insecure algorithms like `'none'`, leading to authentication bypass.
**Prevention:** Strictly omit `'none'` from algorithm whitelists and enforce cryptographic signature validation on all decoded JWS tokens.
