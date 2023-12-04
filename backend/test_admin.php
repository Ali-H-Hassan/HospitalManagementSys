<?php
include 'admin.php';

// Test adding a new doctor
if (addDoctor('Dr. Smith', 'Cardiology')) {
    echo "Doctor added successfully!<br>";
} else {
    echo "Failed to add doctor.<br>";
}

// Test getting all doctors
$doctors = getAllDoctors();
echo "All Doctors: " . json_encode($doctors) . "<br>";

// Test adding a new patient
if (addPatient('John Doe', 'Fever')) {
    echo "Patient added successfully!<br>";
} else {
    echo "Failed to add patient.<br>";
}

// Test getting all patients
$patients = getAllPatients();
echo "All Patients: " . json_encode($patients) . "<br>";
?>
