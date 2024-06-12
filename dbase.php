<?php
// dbase.php

// Define database connection constants
define("DATABASE_HOST", "localhost");
define("DATABASE_USER", "root");
define("DATABASE_PASSWORD", ""); // Assuming empty password
define("DATABASE_NAME", "fkPark"); // Database name

// Establish connection to the database
$conn = new mysqli(DATABASE_HOST, DATABASE_USER, DATABASE_PASSWORD, DATABASE_NAME);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Set the default time zone
date_default_timezone_set('Asia/Kuala_Lumpur');
?>
