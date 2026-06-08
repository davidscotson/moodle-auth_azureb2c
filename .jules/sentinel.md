## 2025-05-15 - JWT and Unserialize Hardening
**Vulnerability:** JWT 'none' algorithm allowed and insecure deserialization in auth flow.
**Learning:** Standard JWT libraries often include 'none' in their default allowed algorithms, and Moodle's use of `unserialize` for state data can be exploited if not hardened.
**Prevention:** Always explicitly whitelist JWT algorithms and use `['allowed_classes' => false]` when unserializing data from potentially untrusted sources.
