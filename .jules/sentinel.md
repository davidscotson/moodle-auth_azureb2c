# Sentinel Security Journal

## 2025-05-15 - JWT Signature Bypass via 'none' Algorithm
**Vulnerability:** The JWT decoding logic explicitly whitelisted the 'none' algorithm, which allows an attacker to bypass signature verification by providing a JWT with `alg: none`.
**Learning:** Even if the application expects signed tokens, if the underlying library or custom implementation supports 'none', it might be exploitable if not explicitly disabled.
**Prevention:** Always remove 'none' from the allowed algorithms list in JWT implementations unless specifically required and secured by other means (e.g. back-channel trust).
