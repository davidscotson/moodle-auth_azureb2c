## 2025-05-15 - [JWT 'none' Algorithm Vulnerability]
**Vulnerability:** The JWT decoding logic in `classes/jwt.php` explicitly allowed the 'none' algorithm.
**Learning:** Allowing 'none' algorithm permits an attacker to bypass signature verification by stripping the signature and changing the header. This is a common but high-risk misconfiguration in JWT libraries.
**Prevention:** Always use a whitelist of strong cryptographic algorithms (e.g., RS256, HS256) and explicitly exclude 'none' from the supported list.

## 2025-05-15 - [Insecure Deserialization in State Data]
**Vulnerability:** `classes/loginflow/authcode.php` used `unserialize()` on state data without restricting class instantiation.
**Learning:** `unserialize()` in PHP can lead to PHP Object Injection if an attacker can control the serialized string, potentially resulting in Remote Code Execution (RCE) depending on available gadgets.
**Prevention:** Use `['allowed_classes' => false]` when calling `unserialize()` if you only expect scalar data or arrays, or use `json_decode()` as a safer alternative for data exchange.
