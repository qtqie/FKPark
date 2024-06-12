<?php
// Database connection settings
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "parking_db";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$space = [
    'space_id' => '',
    'status' => '',
    'location' => '',
    'parking_area' => '',
    'parking_number' => '',
    'spaces' => 0,
    'parking_type' => 'staff'
];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $space_id = $_POST["space_id"];
    $status = $_POST["status"];
    $location = $_POST["location"];
    $parking_area = $_POST["parking_area"];
    $parking_number = $_POST["parking_number"];
    $spaces = $_POST["spaces"];
    $parking_type = $_POST["parking_type"];

    // Update parking table
    $stmt_parking = $conn->prepare("UPDATE parking SET location = ?, parking_area = ?, parking_number = ?, spaces = ?, parking_type = ? WHERE id = (SELECT parking_id FROM parking_spaces WHERE space_id = ?)");
    $stmt_parking->bind_param("sssiss", $location, $parking_area, $parking_number, $spaces, $parking_type, $space_id);

    if ($stmt_parking->execute()) {
        // Update parking space status
        $stmt_space = $conn->prepare("UPDATE parking_spaces SET status = ? WHERE space_id = ?");
        $stmt_space->bind_param("ss", $status, $space_id);
        
        if ($stmt_space->execute()) {
            echo "Parking space and details updated successfully.";
        } else {
            echo "Error updating parking space: " . $stmt_space->error;
        }
        
        $stmt_space->close();
    } else {
        echo "Error updating parking details: " . $stmt_parking->error;
    }

    $stmt_parking->close();
}

if (isset($_GET["id"])) {
    $space_id = $_GET["id"];
    $sql = "SELECT ps.space_id, ps.status, p.location, p.parking_area, p.parking_number, p.spaces, p.parking_type 
            FROM parking_spaces ps 
            JOIN parking p ON ps.parking_id = p.id 
            WHERE ps.space_id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $space_id);
    $stmt->execute();
    $result = $stmt->get_result();
    if ($result->num_rows > 0) {
        $space = $result->fetch_assoc();
    } else {
        echo "No parking space found with the provided ID.";
    }
    $stmt->close();
}

$conn->close();
?>

<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Create Parking Space Page</title>
<style>
* {
  box-sizing: border-box;
}

body {
  font-family: Arial, Helvetica, sans-serif;
  margin: 0;
  padding: 0;
}

/* Style the header */
header {
  background-color: #3EA99F;
  padding: 10px;
  display: flex;
  align-items: center;
  justify-content: space-between;
  font-size: 20px;
  color: white;
}

header img {
  margin-right: 15px;
}

header h2 {
  margin: 0;
}

/* Navigation bar */
ul {
  list-style-type: none;
  margin: 0;
  padding: 0;
  overflow: hidden;
}

li {
  float: left;
  border-right: 1px solid #bbb;
}

li:last-child {
  border-right: none;
}

li a, .dropbtn {
  display: block;
  color: white;
  text-align: center;
  padding: 14px 16px;
  text-decoration: none;
}

li a:hover, .dropdown:hover .dropbtn {
  background-color: #808080;
}

li.dropdown {
  display: inline-block;
}

.dropdown-content {
  display: none;
  position: absolute;
  background-color: #f9f9f9;
  min-width: 160px;
  box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
  z-index: 1;
}

.dropdown-content a {
  color: black;
  padding: 12px 16px;
  text-decoration: none;
  display: block;
  text-align: left;
}

.dropdown-content a:hover {
  background-color: #f1f1f1;
}

.dropdown:hover .dropdown-content {
  display: block;
}

/* Main content */
article {
  margin: 20px auto;
  padding: 20px;
  width: 70%;
  background-color: #f1f1f1;
  border-radius: 10px;
  box-shadow: 0px 0px 15px rgba(0,0,0,0.2);
}

/* Form styling */
form {
  background-color: #ffffff;
  padding: 20px;
  border-radius: 10px;
  box-shadow: 0px 0px 10px rgba(0,0,0,0.1);
}

form label {
  font-weight: bold;
  margin-top: 10px;
  display: block;
}

form input[type="text"], form input[type="number"], form select {
  width: calc(100% - 22px);
  padding: 10px;
  margin-bottom: 20px;
  border: 1px solid #ccc;
  border-radius: 5px;
}

form input[type="submit"], form input[type="reset"] {
  background-color: #3EA99F;
  color: white;
  border: none;
  padding: 10px 20px;
  margin-right: 10px;
  border-radius: 5px;
  cursor: pointer;
}

form input[type="submit"]:hover, form input[type="reset"]:hover {
  background-color: #808080;
}

/* Parking space table styling */
#parking-table {
  margin: 20px 0;
}

.space {
  display: inline-block;
  width: 30%;
  padding: 10px;
  margin: 5px;
  text-align: center;
  border: 1px solid #ccc;
  border-radius: 5px;
  background-color: #ffffff;
  cursor: pointer;
}

.space .status {
  font-weight: bold;
}

/* Clear floats after the columns */
section::after {
  content: "";
  display: table;
  clear: both;
}

/* Style the footer */
footer {
  background-color: #777;
  padding: 10px;
  text-align: center;
  color: white;
}

/* Responsive layout - makes the two columns/boxes stack on top of each other instead of next to each other, on small screens */
@media (max-width: 600px) {
  article {
    width: 100%;
    height: auto;
  }
}
</style>
</head>
<body>

<header>
  <div style="display: flex; align-items: center;">
    <img src="Assets/UMPLogo.jpeg" alt="UMPLogo" style="width:75px;height:86px;">
    <h2>FKPark</h2>
  </div>
  <ul>
    <li><a class="active" href="#home">Home</a></li>
    <li class="dropdown">
      <a href="AddBooking.php" class="dropbtn">Booking</a>
      <div class="dropdown-content">
        <a href="AddBooking.php">Add Booking</a>
        <a href="ViewBooking.php">View Booking</a>
      </div>
    </li>
    <li><a href="#tsummon">Traffic Summon</a></li>
    <li><a href="#help">Help</a></li>
    <li class="dropdown">
      <a href="Parkingsetting" class="dropbtn">Parking Setting</a>
      <div class="dropdown-content">
        <a href="createparkingspace1.php">Create Park</a>
        <a href="view_parking_spaces.php">Edit and Delete Park</a>
        <a href="submitcreateparking1.php">View Park</a>
      </div>
    </li>
    <li style="float:right" class="dropdown">
      <a href="profile" class="dropbtn">Profile</a>
      <div class="dropdown-content">
        <a href="#">Sign Up</a>
        <a href="#">Log In</a>
      </div>
    </li>
  </ul>
</header>

<h2>Edit Parking Space</h2>
<section>
    <article>
        <form method="POST" action="">
            <input type="hidden" name="space_id" value="<?php echo htmlspecialchars($space["space_id"]); ?>">
            
            <div>
                <label for="status">Status:</label>
                <input type="text" id="status" name="status" value="<?php echo htmlspecialchars($space["status"]); ?>">
            </div>
            
            <div>
                <label for="location">Location/Address:</label>
                <input type="text" id="location" name="location" value="<?php echo htmlspecialchars($space["location"]); ?>">
            </div>
            
            <div>
                <label for="parking_area">Parking Area:</label>
                <input type="text" id="parking_area" name="parking_area" value="<?php echo htmlspecialchars($space["parking_area"]); ?>">
            </div>
            
            <div>
                <label for="parking_number">Parking Number:</label>
                <input type="text" id="parking_number" name="parking_number" value="<?php echo htmlspecialchars($space["parking_number"]); ?>">
            </div>
            
            <div>
                <label for="spaces">Total Spaces:</label>
                <input type="number" id="spaces" name="spaces" value="<?php echo htmlspecialchars($space["spaces"]); ?>">
            </div>
            
            <div>
                <label for="parking_type">Parking Type:</label>
                <select id="parking_type" name="parking_type">
                    <option value="staff" <?php if ($space["parking_type"] == 'staff') echo 'selected'; ?>>Staff</option>
                    <option value="students" <?php if ($space["parking_type"] == 'students') echo 'selected'; ?>>Students</option>
                </select>
            </div>
            
            <button type="submit">Update</button>
        </form>
    </article>
</section>

<a href="view_parking_spaces.php"><button>Back to Parking Spaces</button></a>

<footer>
    <p>Copyright © 2024 FKPark. All rights reserved.</p>
</footer>

</body>
</html>
