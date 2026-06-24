# Sentinel Security Journal

## 2025-05-15 - JWT Hardening and Unserialize Protection
**Vulnerability:** JWT 'none' algorithm was allowed in the whitelist, potentially enabling signature bypass. Additionally, `unserialize()` was used on state data without class restrictions, risking PHP Object Injection.
**Learning:** Entry-point files in Moodle (like `index.php` and `ucp.php`) must include `config.php` before the `MOODLE_INTERNAL` constant is defined. Placing a `defined('MOODLE_INTERNAL') || die();` check at the very top of these files will cause a critical regression as they will always `die()`.
**Prevention:** Always restrict `unserialize()` with `['allowed_classes' => false]` when handling data that might be tampered with. Apply `MOODLE_INTERNAL` guards only to library and class files, not primary entry points.
