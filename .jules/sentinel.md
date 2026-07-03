## 2025-05-15 - JWT 'none' Algorithm and Unserialize Hardening
**Vulnerability:** The JWT decoder explicitly whitelisted the 'none' algorithm, and `unserialize` was used on state data without restricting allowed classes.
**Learning:** Even if a library is intended for a specific provider (Azure B2C), whitelisting insecure defaults like 'none' in a generic JWT class creates a high-risk signature bypass. Similarly, using `unserialize` on database-stored state data that originates from OAuth2 parameters (even if indirect) allows for PHP Object Injection if the state record can be manipulated.
**Prevention:** Always explicitly disable the 'none' algorithm in JWT whitelists and use `['allowed_classes' => false]` with `unserialize` unless objects are specifically required.
