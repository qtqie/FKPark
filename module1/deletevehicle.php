<?php
include("submitvehicle.php"); // Include only the database connection file

// Check if 'vehicle_id' exists in the $_GET array and is not empty
if (isset($_POST['vehicle_id'])) {
    $vehicle_id = $_POST['vehicle_id'];

    // Prepare statement to prevent SQL injection
    $query = "DELETE FROM vehicle_info WHERE vehicle_id = ?";
    if ($stmt = mysqli_prepare($conn, $query)) {
        mysqli_stmt_bind_param($stmt, "i", $vehicle_id);
        if (mysqli_stmt_execute($stmt)) {
            echo "success"; // Notify success
        } else {
            echo "Error deleting vehicle information: " . mysqli_stmt_error($stmt);
        }
    } else {
        echo "Failed to prepare statement: " . mysqli_error($conn);
    }

    // Close statement
    mysqli_stmt_close($stmt);
} else {
    echo "Succesfully";
}

// Close connection
mysqli_close($conn);
?>