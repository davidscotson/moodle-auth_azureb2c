# Sentinel Security Journal

## 2025-05-15 - Hardening JWT and Unserialize
**Vulnerability:** JWT 'none' algorithm support allowed signature bypass, and `unserialize` without `allowed_classes` restriction allowed potential PHP Object Injection.
**Learning:** Legacy OIDC implementations often include the 'none' algorithm by default for debugging, which is a major security risk in production. Standardizing `unserialize` to block all classes is a robust defense against object injection when only plain data is expected.
**Prevention:** Always whitelist only secure cryptographic algorithms for JWT and strictly limit class instantiation in `unserialize` calls.
