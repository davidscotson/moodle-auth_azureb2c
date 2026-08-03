## 2026-03-02 - PHP Object Injection in State Deserialization & JWT 'none' Algorithm Signature Bypass
**Vulnerability:**
1. Insecure deserialization of OAuth state parameter data (`additionaldata`) via `unserialize()` without restricting instantiated classes in `classes/loginflow/authcode.php`.
2. The 'none' signature algorithm was included in the JWS algorithms whitelist of the custom JWT library (`classes/jwt.php`), allowing signature bypass if an attacker crafted an unsigned JWT with `"alg": "none"`.

**Learning:**
1. Storing OAuth state parameter additional data as serialized PHP strings can lead to PHP Object Injection and Remote Code Execution (RCE) if an attacker can compromise or inject data into the database state table, or leverage existing unserialization chains. Since only array structures are expected, letting `unserialize` instantiate any class is an unnecessary risk.
2. Even if a JWT library is custom-implemented locally, it must reject the `"none"` algorithm to prevent authentication bypass/signature verification bypass, as ID tokens from identity providers (such as Azure AD B2C) should always be cryptographically signed and verified.

**Prevention:**
1. Always restrict class instantiation when calling `unserialize()` by passing the options array `['allowed_classes' => false]`, or prefer JSON decoding/encoding (`json_decode`, `json_encode`) for simple data structures whenever possible.
2. Explicitly define and whitelist only secure cryptographic signature algorithms (e.g., RS256, HS256, ES256) and ensure 'none' is absent from any algorithm lists in code.
