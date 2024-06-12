<?php
session_start(); // Start the session
include("dbase.php"); // Include your database connection file

// Enable error reporting for debugging
error_reporting(E_ALL);
ini_set('display_errors', 1);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Sanitize and validate input data 
    $vehicle_id = mysqli_real_escape_string($conn, $_POST['vehicle_id']);
    $vehicle_type = mysqli_real_escape_string($conn, $_POST['vehicle_type']);
    $vehicle_plate = mysqli_real_escape_string($conn, $_POST['vehicle_plate']);

    // Handle file upload
    $vehicleGrant = $_FILES['vehicle_grant'];

    // Check for errors during file upload
    if ($vehicleGrant['error'] !== UPLOAD_ERR_OK) {
        $error = "File upload error: " . $vehicleGrant['error'];
        header("Location: viewvehicle.php?error=" . urlencode($error));
        exit;
    }

    // Validate file size
    $maxFileSize = 2 * 1024 * 1024; // 2MB
    if ($vehicleGrant['size'] > $maxFileSize) {
        $error = "File size exceeds the limit of 2MB.";
        header("Location: viewvehicle.php?error=" . urlencode($error));
        exit;
    }

    $fileContent = file_get_contents($vehicleGrant['tmp_name']); // Get content of uploaded file

    // Insert new record
    $query = "INSERT INTO vehicle_info (vehicle_id, vehicle_type, vehicle_plate, file_content) VALUES (?, ?, ?, ?)";
    $stmt = $conn->prepare($query);

    // Check if the statement was prepared successfully
    if ($stmt === false) {
        $error = "Error preparing statement: " . $conn->error;
        header("Location: StudentVehicleList.php?error=" . urlencode($error));
        exit;
    }

    $stmt->bind_param('ssss', $vehicle_id, $vehicle_type, $vehicle_plate, $fileContent);

    if ($stmt->execute()) {
        // Display success message
        echo "Record inserted successfully.";

        // Redirect to a success page
        header("Location: viewvehicle.php");
        exit;
    } else {
        $error = "Error executing statement: " . $stmt->error;
        header("Location: viewvehicle.php?error=" . urlencode($error));
        exit;
    }

    $stmt->close();
}
?>
