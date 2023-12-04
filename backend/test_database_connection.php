<?php
echo "Connecting to: localhost, root, '', Hospital_Management_System_New";
$conn = new mysqli('localhost', 'root', '', 'Hospital_Management_System_New');

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

echo "Connected successfully!";
