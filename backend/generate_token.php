<?php

include 'jwt.php';

// Replace with the actual user ID and user type for testing
$userId = 123;
$userType = 'admin';

$jwt = generateJWT($userId, $userType);

// Print the JWT (for testing purposes)
echo $jwt;
