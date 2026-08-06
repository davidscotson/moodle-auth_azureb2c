## 2026-08-06 - Preventing JWT Signature Bypass and PHP Object Injection in B2C Authentication Flows
**Vulnerability:** Insecure JWT 'none' signature algorithm acceptance in `classes/jwt.php` and loose class unserialization in state parameter reconstruction in `classes/loginflow/authcode.php`.
**Learning:** The application allowed 'none' as a valid JWS algorithm, which permits attackers to bypass token signature verification. Additionally, unserializing the state additional data from the database allowed arbitrary PHP classes to be instantiated, presenting a path for PHP Object Injection.
**Prevention:** Explicitly remove the 'none' algorithm from JWT whitelists and always parse serialized state variables using the `['allowed_classes' => false]` option.
