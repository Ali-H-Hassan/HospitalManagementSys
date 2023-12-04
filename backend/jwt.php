<?php
require __DIR__ . '/vendor/autoload.php';

use \Firebase\JWT\JWT;

// Your secret key for encoding/decoding JWTs
$key = "your_secret_key";

// Function to generate JWT
function generateJWT($user_id, $role) {
    global $key;
    $payload = array(
        "user_id" => $user_id,
        "role" => $role,
        "iat" => time(),
        "exp" => time() + (60 * 60 * 24)  // Token expires in 24 hours
    );

    $jwt = JWT::encode($payload, $key);
    return $jwt;
}

// Function to verify JWT
function verifyJWT($jwt) {
    global $key;
    try {
        $decoded = JWT::decode($jwt, $key, array('HS256'));
        return $decoded;
    } catch (Exception $e) {
        return false;
    }
}
