## 2026-03-01 - JWT Signature Bypass via 'none' Algorithm and PHP Object Injection via Unserialize
**Vulnerability:** Insecure JWT decoding allowed the 'none' algorithm bypass, and unserializing the untrusted OAuth2 state parameter from the database allowed PHP Object Injection.
**Learning:** Decoders often include 'none' in the default JWS algorithm list for testing, but in production, this can lead to signature bypass. Additionally, unserializing database values without restricting classes is unsafe if the database content is populated from external input (like B2C state parameter).
**Prevention:** Remove 'none' from the whitelisted algorithms in production JWT classes and always enforce `['allowed_classes' => false]` when unserializing state records.
