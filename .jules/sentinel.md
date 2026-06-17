## 2025-05-15 - JWT and Unserialize Hardening
**Vulnerability:** JWT signature bypass via 'none' algorithm and PHP Object Injection via insecure unserialize().
**Learning:** The JWT library whitelisted the 'none' algorithm, which could allow attackers to bypass signature verification by modifying the header. Additionally, unserialize() was used on database-stored state data without restricting allowed classes, creating a risk of PHP Object Injection if the database were compromised.
**Prevention:** Always remove 'none' from JWT algorithm whitelists in production. Use `['allowed_classes' => false]` with `unserialize()` unless object instantiation is explicitly required and the source is trusted.
