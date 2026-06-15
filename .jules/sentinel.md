## 2025-05-15 - Harden JWT decoding and unserialize logic
**Vulnerability:** Insecure JWT algorithm whitelist including 'none' and unhardened `unserialize` call on potentially external data.
**Learning:** The JWT library allowed the 'none' algorithm which can lead to signature bypass. The `unserialize` call in the auth code flow did not restrict class instantiation, making it vulnerable to PHP Object Injection if the state data was tampered with.
**Prevention:** Always use a whitelist of secure algorithms for JWT verification and exclude 'none'. Use `['allowed_classes' => false]` with `unserialize()` when processing data that shouldn't contain objects, especially if it originated from or was influenced by external systems.
