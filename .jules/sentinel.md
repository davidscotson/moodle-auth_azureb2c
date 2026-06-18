## 2025-05-15 - [JWT 'none' Algorithm Vulnerability]
**Vulnerability:** The JWT decoding logic whitelisted the 'none' algorithm, which allows an attacker to bypass signature verification by providing an unsigned token.
**Learning:** Whitelisting 'none' is a common but dangerous pattern in JWT libraries that can lead to authentication bypass if signature verification is not strictly enforced elsewhere.
**Prevention:** Always ensure that 'none' is excluded from the list of acceptable algorithms in JWT libraries, especially in authentication plugins.
