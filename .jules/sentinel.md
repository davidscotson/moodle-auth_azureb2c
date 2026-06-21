# Sentinel's Security Journal

## 2024-05-15 - JWT 'none' Algorithm and Unserialize Hardening
**Vulnerability:** Use of 'none' algorithm in JWT decoding and unsafe `unserialize` in authentication flow.
**Learning:** Legacy JWT implementations often include the 'none' algorithm for testing, but it can be exploited to bypass signatures. `unserialize` without class restrictions can lead to PHP Object Injection if the source is untrusted.
**Prevention:** Always whitelist specific, secure JWT algorithms. Harden `unserialize` by setting `allowed_classes` to `false` when only data structures are expected.
