<?php

require_once 'dbase.php';
global $conn;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if form is submitted
    if (isset($_POST['vehicle_type']) && isset($_POST['vehicle_plate'])) {
        // Get form data
        $vehicle_type = $_POST['vehicle_type'];
        $vehicle_plate = $_POST['vehicle_plate'];

        // Update vehicle information in the database
        $update_query = "UPDATE vehicle_info SET vehicle_type = ?, vehicle_plate = ? WHERE vehicle_id = ?";
        $stmt = mysqli_prepare($conn, $update_query);
        mysqli_stmt_bind_param($stmt, 'ssi', $vehicle_type, $vehicle_plate, $vehicle_id);

        // Execute the statement
        if (mysqli_stmt_execute($stmt)) {
            // Redirect to the page showing the updated vehicle information
            header("Location: viewvehicle.php");
            exit();
        } else {
            // Handle the case where the update fails
            echo "Failed to update vehicle information.";
        }
    }
}

$select = 'SELECT  vehicle_id, vehicle_type, vehicle_plate FROM vehicle_info WHERE vehicle_id = ?';
$stmt = mysqli_prepare($conn, $select);
mysqli_stmt_bind_param($stmt, 'i', $vehicle_id);
mysqli_stmt_execute($stmt);
mysqli_stmt_bind_result(
    $stmt,
    $vehicle_id,
    $vehicle_type,
    $vehicle_plate
);

?>
