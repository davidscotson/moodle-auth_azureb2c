## 2024-05-15 - [Harden JWT and Unserialize]
**Vulnerability:** JWT signature bypass via 'none' algorithm and PHP Object Injection via unconstrained unserialize.
**Learning:** Legacy code often includes 'none' in JWT whitelists for debugging or early development, which persists into production. 'unserialize' without 'allowed_classes' is a common pattern that becomes a high-risk vulnerability when combined with attacker-controlled data.
**Prevention:** Always explicitly define 'allowed_classes' => false in 'unserialize' calls unless object hydration is specifically required. Regularly audit JWT algorithm whitelists to ensure insecure options like 'none' are removed.
