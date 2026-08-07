## 2025-05-21 - [JWT Signature Bypass via none Algorithm]
**Vulnerability:** The JWT decoder previously whitelisted the `'none'` algorithm. An attacker could forge an unauthenticated JWT token with `'alg': 'none'` to bypass any signature validation in flows relying on JWT assertions or user mapping.
**Learning:** Whitelisting `'none'` is a common default in standard JWT decoding libraries but extremely insecure in authentication contexts.
**Prevention:** Explicitly remove and reject the `'none'` algorithm from any JWT algorithm whitelist.

## 2025-05-21 - [PHP Object Injection via Unsafe Unserialize]
**Vulnerability:** Deserializing arbitrary user/external data via standard PHP `unserialize` without options allows attackers to instantiate arbitrary PHP classes, potentially triggering malicious object destructors or wakeup methods.
**Learning:** State data received from identity providers or redirected states can be manipulated or forged if not verified, leading to object injection.
**Prevention:** Always specify `['allowed_classes' => false]` in `unserialize` unless specific classes are strictly required.
