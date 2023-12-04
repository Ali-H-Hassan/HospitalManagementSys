<?php
include 'db.php';

// Function to add a new doctor
function addDoctor($name, $specialization) {
    global $conn;

    $sql = "INSERT INTO doctors (name, specialization) VALUES ('$name', '$specialization')";

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
