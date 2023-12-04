<?php
include 'db.php';

// Function to view patient records
function viewPatientRecords($doctorId) {
    global $conn;

    $sql = "SELECT * FROM patients WHERE assigned_doctor_id = $doctorId";
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

    $sql = "UPDATE patients SET medications = '$medications' WHERE id = $patientId";

    if ($conn->query($sql) === TRUE) {
        return true;
    } else {
        return false;
    }
}

// Function to manage appointments
function manageAppointments($doctorId) {
    // Add functionality to manage appointments (calendar of availabilities)
}
?>
