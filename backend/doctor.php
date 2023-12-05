<?php
include 'db.php';
include 'jwt.php';

// Check JWT for authentication
$headers = getallheaders();
$jwt = $headers['Authorization'] ?? '';
$jwt = str_replace('Bearer ', '', $jwt);

$decodedJWT = verifyAndDecodeJWT($jwt);

if (!$decodedJWT || $decodedJWT->user_type !== 'patient') {
    http_response_code(401); // Unauthorized
    exit();
}

// User is authenticated as a patient; you can perform additional authorization checks if needed

// Rest of your code for handling the authenticated patient

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
?>
