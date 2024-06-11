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

function vehicle_info() {
    global $conn;
    // Fetch data from the database
    $sql = "SELECT * FROM vehicle_info";
    $result = $conn->query($sql);

    $vehicle_info = array();

    if ($result->num_rows > 0) {
        // Output data of each row
        while ($row = $result->fetch_assoc()) {
            $vehicle_info[] = $row;
        }
    }

    // Close the connection
    $conn->close();

    return $vehicle_info;
}
?>