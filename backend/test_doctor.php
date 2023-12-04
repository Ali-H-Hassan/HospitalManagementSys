<?php
include 'doctor.php';

// Test viewing patient records
$doctorId = 1; // Assuming doctor ID 1
$patientRecords = viewPatientRecords($doctorId);
echo "Patient Records for Doctor $doctorId: " . json_encode($patientRecords) . "<br>";

// Test prescribing medications
$patientId = 1;  // Assuming patient ID 1
$medications = 'Paracetamol, Antibiotics';
if (prescribeMedications($patientId, $medications)) {
    echo "Medications prescribed successfully!<br>";
} else {
    echo "Failed to prescribe medications.<br>";
}

// Test managing appointments (to be implemented)
?>
