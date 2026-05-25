## 2025-05-14 - Login CSRF and Insecure Deserialization in OIDC Flow
**Vulnerability:** Login CSRF and Potential PHP Object Injection.
**Learning:** The OIDC state validation only checked the 'state' string but didn't verify if it belonged to the same session. Additionally, 'additionaldata' was unserialized without class restrictions.
**Prevention:** Always verify state parameters against the session (e.g., using Moodle's sesskey) and use ['allowed_classes' => false] when unserializing untrusted data from the database.
