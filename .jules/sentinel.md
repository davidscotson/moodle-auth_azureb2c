## 2025-01-24 - Fix Login CSRF in OAuth2 callback
**Vulnerability:** Login CSRF (Cross-Site Request Forgery). The OAuth2 redirect handler (`handleredirect`) did not validate the `sesskey` stored in the state record against the current user's session key.
**Learning:** OAuth2 `state` parameters are often used to prevent CSRF, but they must be tied to the user's session on the client side (Moodle) to be effective. In this case, the `state` was stored in the database with the `sesskey`, but the `sesskey` was not checked upon return.
**Prevention:** Always validate that the session key (`sesskey()`) matches the one stored when the authentication request was initiated.
