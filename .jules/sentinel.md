## 2026-01-07 - Remove 'none' Algorithm from JWS Algorithm Whitelist
**Vulnerability:** The 'none' signature algorithm was included in the JWS algorithms whitelist of the custom JWT library (`classes/jwt.php`), allowing signature bypass if an attacker crafted an unsigned JWT with `"alg": "none"`.
**Learning:** Even if a JWT library is implemented locally, it must reject the `"none"` algorithm to prevent authentication bypass/signature verification bypass vulnerabilities, as OAuth2 / OIDC providers should always sign their ID tokens.
**Prevention:** Explicitly define and whitelist only cryptographic algorithms (e.g., RS256, HS256) and ensure 'none' is absent from any algorithm lists in code.
