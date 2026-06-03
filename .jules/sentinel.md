## 2025-05-15 - Hardening JWT and Deserialization
**Vulnerability:** JWT 'none' algorithm support and insecure unserialize of state data.
**Learning:** The 'none' algorithm allows bypassing JWT signature verification, and default unserialize is vulnerable to PHP Object Injection if the data source is compromised.
**Prevention:** Explicitly whitelist only cryptographic algorithms for JWT and use 'allowed_classes' => false for unserialize when objects are not needed.
