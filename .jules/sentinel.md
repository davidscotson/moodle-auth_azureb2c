## 2025-05-15 - JWT Signature Bypass via 'none' Algorithm
**Vulnerability:** The JWT decoding logic explicitly whitelisted the 'none' algorithm, allowing tokens to bypass cryptographic signature verification.
**Learning:** Whitelisting 'none' in a JWT library is a common but dangerous pattern often inherited from generic examples. In the context of Azure B2C, tokens are always signed, making 'none' unnecessary and risky.
**Prevention:** Always use a strict whitelist of expected cryptographic algorithms (e.g., RS256) and never include 'none' unless the protocol specifically requires unsigned tokens in a secure channel.

## 2025-05-15 - PHP Object Injection in Authentication Flow
**Vulnerability:** User-controllable state data was being unserialized without restrictions, potentially allowing for PHP Object Injection if an attacker could influence the `auth_azureb2c_state` table or if the state initiation was compromised.
**Learning:** Even data stored in the database should be treated with suspicion if it originated from external parameters or complex logic. Using `unserialize` without `allowed_classes => false` is a high-risk pattern in PHP.
**Prevention:** Always restrict `unserialize` to not allow class instantiation (`['allowed_classes' => false]`) unless absolutely necessary, or prefer `json_encode`/`json_decode` for data persistence.
