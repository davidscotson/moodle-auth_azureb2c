## 2026-06-10 - Insecure JWT 'none' Algorithm Support
**Vulnerability:** The JWT decoding implementation whitelisted the 'none' signature algorithm, allowing signature-bypass/algorithm confusion attacks where an attacker could provide an unverified JWT payload.
**Learning:** Whitelisting 'none' as a valid JWS algorithm undermines token authenticity verification because a bearer token without any signature can be parsed and trusted as valid.
**Prevention:** Explicitly remove 'none' from the whitelisted JWT algorithms array.
