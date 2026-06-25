## 2025-05-15 - Hardening JWT and Unserialize
**Vulnerability:** JWT "algorithm none" signature bypass and potential PHP Object Injection via `unserialize`.
**Learning:** The application's JWT decoder explicitly allowed the `none` algorithm, which is a known vulnerability allowing signature bypass. Additionally, `unserialize` was used on data from the `auth_azureb2c_state` table without restricting allowed classes.
**Prevention:** Always remove `none` from JWT algorithm whitelists in production. When using `unserialize` on data that doesn't need to be objects, always set `allowed_classes` to `false`.
