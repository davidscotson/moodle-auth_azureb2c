## 2025-05-15 - JWT None Algorithm and Unserialize Hardening
**Vulnerability:** The JWT implementation allowed the 'none' algorithm, which could let attackers bypass signature verification by providing an unsigned token. Additionally, the use of `unserialize` on state data without class restrictions posed a PHP Object Injection risk.
**Learning:** Legacy JWT libraries often include 'none' for debugging, but it's a major security risk in production. Standard Moodle plugins should also always enforce `MOODLE_INTERNAL` checks and harden `unserialize` as a baseline.
**Prevention:** Always whitelist specific, secure JWT algorithms and use `['allowed_classes' => false]` with `unserialize` unless object instantiation is strictly necessary.
