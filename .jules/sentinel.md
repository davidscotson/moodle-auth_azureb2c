# Sentinel Security Journal

## 2025-05-15 - JWT 'none' algorithm removal
**Vulnerability:** The JWT decoding logic in `classes/jwt.php` supported the 'none' algorithm.
**Learning:** Supporting 'none' in JWT libraries allows attackers to bypass signature verification by spoofing the header.
**Prevention:** Never include 'none' in the list of supported JWS algorithms.

## 2025-05-15 - PHP Object Injection hardening in unserialize
**Vulnerability:** `unserialize()` was used on state data in `classes/loginflow/authcode.php` without restricting allowed classes.
**Learning:** Insecure deserialization can lead to PHP Object Injection and potentially RCE.
**Prevention:** Always pass `['allowed_classes' => false]` to `unserialize()` unless specific classes are required and safely whitelisted.
