# Sentinel Security Journal

## 2025-05-14 - Hardened JWT decoding and Unserialization
**Vulnerability:** The JWT implementation explicitly whitelisted the 'none' algorithm, and state data was being unserialized without restrictions.
**Learning:** Legacy or simplified JWT implementations often include 'none' for testing but forget to remove it. Unserialization of database records (like state) can be a vector if the database is partially compromised or if the state parameter can be manipulated to point to malicious records.
**Prevention:** Always remove 'none' from production JWT algorithm whitelists. Use ['allowed_classes' => false] with unserialize() when dealing with data that doesn't strictly need to be an object.
