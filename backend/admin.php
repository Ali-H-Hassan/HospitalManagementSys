<?php
include 'db.php';
include 'jwt.php';

// Check JWT for authentication
$headers = getallheaders();
$jwt = $headers['Authorization'] ?? '';

$decodedJWT = verifyAndDecodeJWT($jwt);

if (!$decodedJWT || $decodedJWT->user_type !== 'admin') {
    http_response_code(401); // Unauthorized
    exit();
}

// Check user type and perform authorization checks
$userType = $decodedJWT->user_type;

// Perform authorization checks based on user type
if ($userType !== 'admin') {
    http_response_code(403); // Forbidden
    exit();
}

// Handle admin actions
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Check the action parameter to determine the action
    $action = $_POST['action'] ?? '';

    // Handle the actions accordingly
    switch ($action) {
        case 'addDoctor':
            $name = $_POST['name'] ?? '';
            $specialty = $_POST['specialty'] ?? '';
            
            if (addDoctor($name, $specialty)) {
                echo 'Doctor added successfully!';
            } else {
                echo 'Failed to add doctor.';
            }
            break;
        
        case 'getAllDoctors':
            $doctors = getAllDoctors();
            echo json_encode($doctors);
            break;
            
        default:
            echo 'Invalid action.';
    }
} else {
    echo 'Invalid request method.';
}
?>
