<?php
include 'db.php';
include 'jwt.php';

// Check JWT for authentication
$headers = getallheaders();
$jwt = $headers['Authorization'] ?? '';

$decodedJWT = verifyAndDecodeJWT($jwt);

if (!$decodedJWT) {
    http_response_code(401); // Unauthorized
    exit();
}

// Check user type and perform authorization checks
$userType = $decodedJWT->user_type;

// Perform authorization checks based on user type
if ($userType === 'admin') {
    // Authorized for admin actions
} elseif ($userType === 'doctor') {
    // Authorized for doctor actions
} elseif ($userType === 'patient') {
    // Authorized for patient actions
} else {
    http_response_code(403); // Forbidden
    exit();
}
// Function to add a new doctor
function addDoctor($name, $specialty) {
    global $conn;

    $sql = "INSERT INTO doctors (name, specialty) VALUES ('$name', '$specialty')";

    if ($conn->query($sql) === TRUE) {
        return true;
    } else {
        return false;
    }
}

// Function to get all doctors
function getAllDoctors() {
    global $conn;

    $sql = "SELECT * FROM doctors";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        return $result->fetch_all(MYSQLI_ASSOC);
    } else {
        return [];
    }
}

// Add similar functions for updating and deleting doctors

// Function to add a new patient
function addPatient($name, $illness) {
    global $conn;

    $sql = "INSERT INTO patients (name, illness) VALUES ('$name', '$illness')";

    if ($conn->query($sql) === TRUE) {
        return true;
    } else {
        return false;
    }
}

// Function to get all patients
function getAllPatients() {
    global $conn;

    $sql = "SELECT * FROM patients";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        return $result->fetch_all(MYSQLI_ASSOC);
    } else {
        return [];
    }
}

// Add similar functions for updating and deleting patients
?>
