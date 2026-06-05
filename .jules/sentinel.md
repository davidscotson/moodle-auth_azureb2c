## 2025-05-15 - JWT 'none' Algorithm Support
**Vulnerability:** The JWT decoding logic explicitly allowed the 'none' algorithm in its whitelist.
**Learning:** OIDC/OAuth2 implementations often default to whitelisting several algorithms including 'none', which can lead to signature bypass if not carefully handled.
**Prevention:** Always remove 'none' from the allowed algorithms list unless there is a very specific, secured use case for it.
