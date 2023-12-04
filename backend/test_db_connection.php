<?php
include 'db.php';

if ($conn) {
    echo "Database connected successfully!";
} else {
    echo "Error connecting to the database: " . $conn->connect_error;
}
