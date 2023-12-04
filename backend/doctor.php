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
// Function to view patient records
function viewPatientRecords($doctorId) {
    global $conn;

    $sql = "SELECT * FROM Patients WHERE room_number = $doctorId";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        return $result->fetch_all(MYSQLI_ASSOC);
    } else {
        return [];
    }
}

// Function to prescribe medications
function prescribeMedications($patientId, $medications) {
    global $conn;

    $sql = "UPDATE Patients SET medications = '$medications' WHERE id = $patientId";

    if ($conn->query($sql) === TRUE) {
        return true;
    } else {
        return false;
    }
}

// Function to manage appointments (to be implemented)
function manageAppointments($doctorId) {
    // Add functionality to manage appointments (calendar of availabilities)
}
?>
