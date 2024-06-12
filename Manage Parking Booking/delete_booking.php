<?php
// Database credentials
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "fkpark_db";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "DELETE FROM bookings WHERE id=$id";

    if ($conn->query($sql) === TRUE) {
        echo "Record deleted successfully";
    } else {
        echo "Error deleting record: " . $conn->error;
    }

    header("Location: view_booking.php");
} else {
    header("Location: view_booking.php");
}

$conn->close();
?>
