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

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $id_number = $_POST['id'];
    $parking_area = $_POST['parking_area'];

    // Prepare and bind
    $stmt = $conn->prepare("INSERT INTO bookings (name, id_number, parking_area) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $name, $id_number, $parking_area);

    // Execute the statement
    if ($stmt->execute()) {
        echo "New booking created successfully";
    } else {
        echo "Error: " . $stmt->error;
    }

    // Close the statement and connection
    $stmt->close();
    $conn->close();
} else {
    echo "Invalid request method.";
}
?>
