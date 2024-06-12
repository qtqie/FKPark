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

<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Booking Confirmation</title>
<style>
body {
    font-family: Arial, Helvetica, sans-serif;
    margin: 0;
    padding: 20px;
    background-color: #f1f1f1;
}

button {
    margin-top: 20px;
    padding: 10px 20px;
    background-color: #3EA99F;
    color: white;
    border: none;
    border-radius: 5px;
    cursor: pointer;
}

button:hover {
    background-color: #808080;
}
</style>
</head>
<body>

<p><a href="../Module3/AddBooking.php"><button>Back to Home</button></a></p>
<p><a href="../Module3/view_booking.php"><button>View My Bookings</button></a></p>

</body>
</html>
