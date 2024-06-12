<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $id = $_POST['vehicle_id'];
  include("dbase.php");

  // SQL to delete a record
  $sql = "DELETE FROM vehicle_info WHERE vehicle_id = ?";

  if ($stmt = $conn->prepare($sql)) {
    $stmt->bind_param("i", $id); // Corrected from $vehicle_id to $id
    if ($stmt->execute()) {
      echo "Record deleted successfully";
    } else {
      echo "Error deleting record: " . $stmt->error;
    }
    $stmt->close();
  } else {
    echo "Error preparing statement: " . $conn->error;
  }

  // Redirect back to the main page
  header("Location: viewvehicle.php");
  exit();
} else {
  // Redirect if accessed directly
  header("Location: viewvehicle.php");
  exit();
}
?>
