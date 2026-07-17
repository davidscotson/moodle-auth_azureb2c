## 2025-05-21 - JWT Signature Bypass via 'none' Algorithm
**Vulnerability:** The JWS algorithm whitelist included the 'none' algorithm, which is an unsigned token format. This could allow an attacker to forge arbitrary JWT payloads and bypass signature validation.
**Learning:** JWT libraries often support 'none' by default or carry it over from draft specs, but in a production environment (especially identity provider federations), 'none' should be strictly prohibited.
**Prevention:** Always restrict the whitelisted algorithms to secure cryptographic ones (such as HS256, RS256, ES256) and explicitly remove 'none' from any algorithm whitelist.
