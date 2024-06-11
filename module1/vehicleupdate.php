<?php
require_once 'bootstrap.php';

// if the request method is post if not, redirect to vehicles.php
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    to_url('vehiclesubmit.php');
    return;
}

require_once 'dbase.php';
global $conn;

// check if current plate is the same as the new plate

$select = 'SELECT vehicle_plate FROM vehicle_info WHERE vehicle_id = ?';
$stmt = mysqli_prepare($conn, $select);
mysqli_stmt_bind_param($stmt, 'i', $_GET['vehicle_id']);
mysqli_stmt_execute($stmt);
mysqli_stmt_bind_result($stmt, $vehicle_plate);
mysqli_stmt_fetch($stmt);
mysqli_stmt_close($stmt);



// prepare the update statement
$update = 'UPDATE vehicle_info SET vehicle_type = ?, vehicle_plate = ?, WHERE vehicle_id = ?';
$stmt = mysqli_prepare($conn, $update);
mysqli_stmt_bind_param($stmt, 'sssi', $_POST['vehicle_type'], $_POST['vehicle_plate'],  $_GET['vehicle_id']);
mysqli_stmt_execute($stmt);

// redirect to vehicles.php
to_url('vehiclesubmit.php');
?>