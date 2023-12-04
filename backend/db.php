<?php
$servername = "localhost";
$username = "root";  // Assuming you are using the default username 'root'
$password = "";      // Assuming there is no password (leave it empty)
$dbname = "Hospital_Management_System";  // Use the correct database name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
