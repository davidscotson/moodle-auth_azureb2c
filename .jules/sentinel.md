## 2026-08-12 - JWT Algorithm Whitelist & Deserialization Hardening
**Vulnerability:** JWT signature bypass via `none` algorithm and PHP Object Injection via un-restricted `unserialize()`.
**Learning:** Legacy OAuth2 / JWT implementations in Moodle plugins may include `none` in the JWS algorithm whitelist and deserialize state records without `allowed_classes => false`.
**Prevention:** Always restrict JWS algorithm whitelist to explicit signature algorithms (e.g. RS256, HS256) and pass `['allowed_classes' => false]` to `unserialize()` when deserializing untrusted state parameters.
