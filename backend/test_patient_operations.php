<?php
include 'patient.php';

// Test viewing personal medical history
$patientId = 1; // Assuming patient ID 1
$medicalHistory = viewMedicalHistory($patientId);
echo "Medical History for Patient $patientId: " . json_encode($medicalHistory) . "<br>";

// Test viewing upcoming appointments
$upcomingAppointments = viewUpcomingAppointments($patientId);
echo "Upcoming Appointments for Patient $patientId: " . json_encode($upcomingAppointments) . "<br>";

// Test booking an appointment
$doctorId = 1; // Assuming doctor ID 1
$date = '2023-12-15 10:00:00'; // Assuming a specific date and time
if (bookAppointment($patientId, $doctorId, $date)) {
    echo "Appointment booked successfully!<br>";
} else {
    echo "Failed to book the appointment.<br>";
}

// Test canceling an appointment
$appointmentId = 1; // Assuming appointment ID 1
if (cancelAppointment($patientId, $appointmentId)) {
    echo "Appointment canceled successfully!<br>";
} else {
    echo "Failed to cancel the appointment.<br>";
}
?>
