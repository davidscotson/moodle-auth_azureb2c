## 2026-11-09 - Insecure Deserialization in State Data
**Vulnerability:** Deserializing OAuth state `additionaldata` without restricting allowed classes allowed arbitrary object instantiation.
**Learning:** `unserialize()` by default instantiates serialized objects and triggers magic methods (`__wakeup`, `__destruct`), enabling PHP Object Injection and POP chains.
**Prevention:** Pass `['allowed_classes' => false]` to `unserialize()` when parsing serialized session or state records where only data arrays or primitives are expected.
