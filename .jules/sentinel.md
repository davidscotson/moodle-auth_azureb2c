## 2025-05-15 - JWT None Algorithm Hardening
**Vulnerability:** JWT signature bypass via the 'none' algorithm.
**Learning:** The 'none' algorithm allowed token verification bypass since no signature check is performed.
**Prevention:** Whitelist only strong JWS algorithms in JWT parsing to secure token verification.
