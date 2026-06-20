## 2025-05-15 - JWT 'none' Algorithm and Insecure Unserialize hardening
**Vulnerability:** The JWT library allowed the 'none' algorithm, enabling signature bypass. Additionally, `unserialize` was used on database-stored state data without class restrictions.
**Learning:** Even specialized plugins for secure protocols like OIDC can implement JWT handling insecuredly by whitelisting 'none'. Database-stored session/state data should still be treated as untrusted if it can be influenced by external redirects.
**Prevention:** Always explicitly whitelist only cryptographic algorithms for JWT. Use `['allowed_classes' => false]` for `unserialize` unless object instantiation is strictly required.
