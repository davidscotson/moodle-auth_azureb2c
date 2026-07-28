## 2026-01-07 - [JWT Algorithm Whitelist Hardening]
**Vulnerability:** JWT Signature Bypass (by using 'none' algorithm).
**Learning:** Accepting the 'none' signature algorithm allows an attacker to bypass cryptographic signature verification completely and claim arbitrary identities or scopes.
**Prevention:** Explicitly exclude 'none' from whitelisted cryptographic algorithms allowed during JWS payload decoding.
