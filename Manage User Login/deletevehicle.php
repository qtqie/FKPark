<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $id = $_POST['vehicle_id'];

  // Database connection
  $conn = new mysqli($servername, $username, $password, $dbname);

  if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  }

  // SQL to delete a record
  $sql = "DELETE FROM vehicle_info WHERE vehicle_id = ?";

  if ($stmt = $conn->prepare($sql)) {
    $stmt->bind_param("i", $vehicle_id);
    if ($stmt->execute()) {
      echo "Record deleted successfully";
    } else {
      echo "Error deleting record: " . $stmt->error;
    }
    $stmt->close();
  } else {
    echo "Error preparing statement: " . $conn->error;
  }

  $conn->close();

  // Redirect back to the main page
  header("Location: viewvehicle.php");
  exit();
} else {
  // Redirect if accessed directly
  header("Location: viewvehicle.php");
  exit();
}
?>
