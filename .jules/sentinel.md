## 2026-03-09 - Hardening Deserialization of State Additional Data
**Vulnerability:** PHP Object Injection via unserialize on auth_azureb2c_state database record's additionaldata field.
**Learning:** State metadata or session payload database fields that are retrieved and unserialized must never allow class instantiation. Even when the payload is generated internally, any database manipulation or parameter injection could expose the application to PHP Object Injection vulnerabilities.
**Prevention:** Always harden PHP unserialize calls with the option `['allowed_classes' => false]` when deserializing stored data structures that do not strictly require object instantiation.
