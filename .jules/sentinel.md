## 2025-01-24 - JWT 'none' Removal and Unserialize Hardening
**Vulnerability:** The `jwt::decode` method allowed the insecure `'none'` algorithm, and `unserialize` was used on database-stored state data without class restrictions.
**Learning:** Legacy JWT implementations often include `'none'` for testing, which can be exploited for algorithm confusion. Unserializing data from the database is risky if any part of that data can be influenced by an attacker (e.g., via state parameter manipulation in OAuth flows).
**Prevention:** Always whitelist allowed JWT algorithms and disable class instantiation in `unserialize` by passing `['allowed_classes' => false]`.
