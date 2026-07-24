## 2025-05-21 - Preventing JWT Signature Bypass and PHP Object Injection
**Vulnerability:** JWT decoding whitelist included the 'none' algorithm, and state metadata was unserialized without disabling class loading.
**Learning:** Allowing the 'none' algorithm allows signature spoofing/bypass because an attacker can strip the signature and specify 'none' in the JWT header. Unhardened PHP `unserialize` calls allow PHP Object Injection if the serialized payload is user-controlled.
**Prevention:** Always remove 'none' from JWT whitelists, and always pass `['allowed_classes' => false]` when unserializing untrusted or session-controlled payloads.
