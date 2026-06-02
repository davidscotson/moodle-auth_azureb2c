## 2025-01-24 - Unserialize Hardening and CI Troubleshooting
**Vulnerability:** Insecure usage of `unserialize` on database-stored state data in `authcode.php`.
**Learning:** Hardening deserialization in Moodle plugins is a high-impact security win. Troubleshooting CI in this environment revealed that PHP 8.2+ dynamic property deprecations can cause segfaults in PHPUnit if class properties like `$resource` are not explicitly declared.
**Prevention:** Always use `['allowed_classes' => false]` with `unserialize` and explicitly declare all class properties for modern PHP compatibility.
