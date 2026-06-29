# Sentinel Security Journal

## 2025-05-15 - JWT 'none' Algorithm Vulnerability
**Vulnerability:** The JWT decoding logic explicitly allowed the 'none' algorithm in its whitelist.
**Learning:** This allows an attacker to bypass signature verification by providing a JWT with `alg: none`, which can lead to authentication bypass if the signature is not checked (which it currently isn't, but whitelisting 'none' makes it worse if it were).
**Prevention:** Always remove 'none' from the allowed algorithms list and ensure strong cryptographic verification of JWT signatures.

## 2025-05-15 - Insecure Unserialization
**Vulnerability:** `unserialize()` was called on data from the database without restricting allowed classes.
**Learning:** If an attacker can manipulate the `auth_azureb2c_state` table (e.g. via another vulnerability), they could achieve PHP Object Injection.
**Prevention:** Always use `['allowed_classes' => false]` with `unserialize()` unless objects are specifically expected, and even then, use a whitelist.
