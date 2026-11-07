## 2026-05-30 - CSRF Protection in User Control Panel
**Vulnerability:** State-changing actions (`connectlogin` and `disconnectlogin`) in `ucp.php` lacked CSRF protection (`require_sesskey()`), allowing an attacker to forge requests causing users to connect or disconnect their Azure B2C login.
**Learning:** Legacy endpoints directly processing GET parameters like `action` need explicit CSRF protection via `require_sesskey()`, and corresponding action links must supply `'sesskey' => sesskey()`.
**Prevention:** Always ensure any state-changing web action validates Moodle's session key via `require_sesskey()`.
