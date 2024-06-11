<?php
// Database credentials
$servername = "localhost";
$username = "root"; // Default username for XAMPP/WAMP/MAMP is 'root'
$password = ""; // Default password for XAMPP/WAMP/MAMP is empty
$dbname = "fkpark_db"; // Just the database name, not the table name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

function registration() {
    global $conn;
    // Fetch data from the database
    $sql = "SELECT * FROM registration";
    $result = $conn->query($sql);

    $registration = array();

    if ($result->num_rows > 0) {
        // Output data of each row
        while ($row = $result->fetch_assoc()) {
            $registration[] = $row;
        }
    }

    // Close the connection
    $conn->close();

    return $registration;
}
?>