<?php
include __DIR__ . 'jwt.php';

// Example usage of JWT functions
$user_id = 1;
$role = 'admin';

$jwt = generateJWT($user_id, $role);
echo "Generated JWT: " . $jwt . "<br>";

$decoded = verifyJWT($jwt);

if ($decoded) {
    echo "Decoded JWT: " . json_encode($decoded);
} else {
    echo "JWT verification failed.";
}
