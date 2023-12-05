<?php

require __DIR__ . '/vendor/autoload.php';

use Firebase\JWT\JWT;

// Define your secret key for encoding/decoding JWTs
$secretKey = 'your_secret_key'; // Replace with a secure, unique key

// Function to generate a JWT for a user
function generateJWT($userId, $userType) {
    global $secretKey;

    $tokenPayload = [
        'user_id' => $userId,
        'user_type' => $userType,
        'exp' => time() + (60 * 60) // Token expiration time (1 hour)
    ];

    return JWT::encode($tokenPayload, $secretKey, 'HS256');
}

// Function to verify and decode a JWT
function verifyAndDecodeJWT($jwt) {
    global $secretKey;

    try {
        $decoded = JWT::decode($jwt, $secretKey, ['HS256']);
        return $decoded;
    } catch (\Throwable $e) {
        return null;
    }
}



