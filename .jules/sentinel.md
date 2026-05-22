## 2025-05-14 - JWT Validation Hardening
**Vulnerability:** Missing `exp` (expiry) and `aud` (audience) claim validation in ID tokens, and support for the insecure `none` algorithm in the JWT library.
**Learning:** OIDC implementations often focus on the authentication result (the `sub` claim) but overlook critical token integrity and lifecycle checks, leaving the application vulnerable to replay attacks and token substitution.
**Prevention:** Always implement mandatory `exp` and `aud` checks with appropriate leeway for clock drift, and strictly whitelist allowed cryptographic algorithms, ensuring `none` is never permitted.
