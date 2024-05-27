<?php
// Database connection parameters
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

// Check if form was submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve the form data
    $user_id = htmlspecialchars($_POST['user_id']);
    $user_pw = htmlspecialchars($_POST['user_pw']);

    // Prepare and bind the SQL statement
    $stmt = $conn->prepare("INSERT INTO users (user_id, user_pw) VALUES (?, ?)");
    $stmt->bind_param("ss", $user_id, $user_pw);

    // Execute the statement and check for success
    if ($stmt->execute()) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $stmt->error;
    }

    // Close the statement and connection
    $stmt->close();
    $conn->close();
}
?>
