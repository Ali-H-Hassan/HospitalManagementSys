<?php
include 'db.php';
include 'jwt.php';

// Function to register a new user
function registerUser($username, $password, $role) {
    global $conn;

    // Hash the password before storing it in the database
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    $sql = "INSERT INTO users (username, password, role) VALUES ('$username', '$hashed_password', '$role')";

    if ($conn->query($sql) === TRUE) {
        return true;
    } else {
        return false;
    }
}

// Function to log in a user
function loginUser($username, $password) {
    global $conn;

    $sql = "SELECT * FROM users WHERE username='$username'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $hashed_password = $row['password'];

        // Verify the password
        if (password_verify($password, $hashed_password)) {
            $user_id = $row['id'];
            $role = $row['role'];

            // Generate and return a JWT
            return generateJWT($user_id, $role);
        } else {
            return false;  // Incorrect password
        }
    } else {
        return false;  // User not found
    }
}
