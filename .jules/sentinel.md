## 2025-05-15 - JWT None Algorithm and Unserialize Hardening
**Vulnerability:** JWT signature bypass via the 'none' algorithm and PHP Object Injection via insecure unserialization of state records.
**Learning:** The 'none' algorithm allowed token verification bypass since no signature check is performed, and PHP unserialize without restricting classes allowed arbitrary object instantiation.
**Prevention:** Whitelist only strong JWS algorithms in JWT parsing and specify 'allowed_classes => false' when deserializing state parameters to secure the authentication flow.
