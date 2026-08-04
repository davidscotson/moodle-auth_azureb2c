## 2026-02-12 - [JWT Signature Bypass Prevention]
**Vulnerability:** Acceptance of the JWT 'none' algorithm in the JSON Web Signature (JWS) whitelist allowed potential signature bypass attacks where an attacker could construct an unsigned token.
**Learning:** Whitelists of cryptographic algorithms should never include 'none' by default unless there is an extremely specific, fully-verified reason to support unsigned payloads.
**Prevention:** Always explicitly exclude 'none' from cryptographic algorithm lists in token-handling libraries.
