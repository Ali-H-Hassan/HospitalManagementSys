<?php
include 'db.php';
include 'jwt.php';

$authorizationHeader = $_SERVER['HTTP_AUTHORIZATION'] ?? '';
$jwt = str_replace('Bearer ', '', $authorizationHeader);

// Debugging: Output the JWT token for verification
var_dump($jwt);




// Check if JWT token is not empty
if (!empty($jwt)) {
    // Verify and decode the JWT
    $decodedJWT = verifyAndDecodeJWT($jwt);

    // Debugging: Output the decoded JWT for verification
    var_dump($decodedJWT);

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

    // Rest of your code for handling the authenticated user

    // Function to view personal medical history
    function viewMedicalHistory($patientId) {
        global $conn;

        $sql = "SELECT * FROM patients WHERE id = $patientId";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            return $result->fetch_assoc();
        } else {
            return null;
        }
    }

    // Function to view upcoming appointments
    function viewUpcomingAppointments($patientId) {
        global $conn;

        // Assuming current date and time
        $currentDate = date('Y-m-d H:i:s');

        $sql = "SELECT * FROM Appointments WHERE patient_id = $patientId AND appointment_date > '$currentDate'";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            return $result->fetch_all(MYSQLI_ASSOC);
        } else {
            return [];
        }
    }

    // Function to book an appointment
    function bookAppointment($patientId, $doctorId, $date) {
        global $conn;

        $sql = "INSERT INTO Appointments (doctor_id, patient_id, appointment_date) VALUES ($doctorId, $patientId, '$date')";

        if ($conn->query($sql) === TRUE) {
            return true;
        } else {
            return false;
        }
    }

    // Function to cancel an appointment
    function cancelAppointment($patientId, $appointmentId) {
        global $conn;

        $sql = "DELETE FROM Appointments WHERE id = $appointmentId AND patient_id = $patientId";

        if ($conn->query($sql) === TRUE) {
            return true;
        } else {
            return false;
        }
    }
} else {
    // JWT token is empty
    echo "JWT token is empty.";
    http_response_code(401); // Unauthorized
    exit();
}
?>
