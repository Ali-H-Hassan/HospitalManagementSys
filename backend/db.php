<?php
$servername = "localhost";
$username = "root";  // Assuming you are using the default username 'root'
$password = null;      // Assuming there is no password (leave it empty)
$dbname = "Hospital_Management_System_New";

// Create connection
$conn = new mysqli('localhost', 'root', '', 'Hospital_Management_System_New', 3307);


// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
