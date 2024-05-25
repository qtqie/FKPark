<?php
// Database credentials
$servername = "localhost";
$username = "root"; // Default username for XAMPP/WAMP/MAMP is 'root'
$password = ""; // Default password for XAMPP/WAMP/MAMP is empty
$dbname = "parking_dbtest"; // Just the database name, not the table name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

function parking_spots() {
    global $conn;
    // Fetch data from the database
    $sql = "SELECT * FROM parking_spots";
    $result = $conn->query($sql);

    $parkingSpots = array();

    if ($result->num_rows > 0) {
        // Output data of each row
        while ($row = $result->fetch_assoc()) {
            $parkingSpots[] = $row;
        }
    }

    // Close the connection
    $conn->close();

    return $parkingSpots;
}
?>
