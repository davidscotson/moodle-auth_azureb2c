## 2025-05-14 - JWT and Unserialize Hardening
**Vulnerability:** Missing JWT 'exp' and 'aud' validation, insecure 'none' algorithm, and potential object injection via unserialize.
**Learning:** OIDC plugins must strictly validate tokens and handle serialized data securely to prevent authentication bypass and RCE.
**Prevention:** Always whitelist algorithms, validate standard claims (exp, aud, iat), and use 'allowed_classes' => false with unserialize.
