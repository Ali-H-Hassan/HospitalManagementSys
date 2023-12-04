<?php
include 'db.php';

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

    $sql = "SELECT * FROM appointments WHERE patient_id = $patientId AND date > NOW()";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        return $result->fetch_all(MYSQLI_ASSOC);
    } else {
        return [];
    }
}

// Function to book/cancel appointments
function bookCancelAppointment($patientId, $date, $action) {
    // Add functionality to book or cancel appointments
}
?>
