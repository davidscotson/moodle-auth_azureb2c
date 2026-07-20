## 2026-07-20 - PHP Object Injection via Unsafe State Deserialization
**Vulnerability:** Deserializing OAuth2 state variables using PHP's standard `unserialize()` without restricting the class whitelist can trigger PHP Object Injection (POI) / deserialization attacks.
**Learning:** Deserializing untrusted input, even when fetched from a database table mapped to high-entropy keys, poses a severe risk of object injection if any system components or plugins have exploit chain classes.
**Prevention:** Always harden `unserialize()` with `['allowed_classes' => false]` when decoding non-object structured payloads.
