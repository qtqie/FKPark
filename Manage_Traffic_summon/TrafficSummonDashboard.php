<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Traffic Summon Dashboard</title>
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

/* Adjust the header elements */
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

form input[type="text"], form input[type="number"] {
  width: calc(100% - 22px);
  padding: 10px;
  margin-bottom: 20px;
  border: 1px solid #ccc;
  border-radius: 5px;
}

form input[type="submit"] {
  background-color: #3EA99F;
  color: white;
  border: none;
  padding: 10px 20px;
  margin-right: 10px;
  border-radius: 5px;
  cursor: pointer;
}

form input[type="submit"]:hover {
  background-color: #808080;
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

/* Responsive layout */
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
    <img src="UMPLogo.jpeg" alt="UMPLogo" style="width:75px;height:86px;">
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
    <li class="dropdown">
      <a href="#tsummon" class="dropbtn">Traffic Summon</a>
      <div class="dropdown-content">
        <a href="View traffic summon.php">View summon</a>
        <a href="Summon detail.php">Summon detail</a>
        <a href="User demerit point.php">User demerit point</a>
      </div>
    </li>
    <li><a href="#help">Help</a></li>
    <li class="dropdown">
      <a href="Parkingsetting" class="dropbtn">Parking Setting</a>
      <div class="dropdown-content">
        <a href="#">Create Park</a>
        <a href="#">Update Park</a>
        <a href="#">Delete Park</a>
        <a href="#">View Park</a>
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

<section>
  <article>
    <form action="InsertSummonDetail.php" method="post">
      <div>
        <label for="id">ID:</label>
        <input type="number" id="id" name="id">
      </div>

      <div>
        <label for="VehiclePlate">Vehicle Plate:</label>
        <input type="text" id="VehiclePlate" name="VehiclePlate">
      </div>

      <div>
        <input type="submit" value="Submit">
      </div>
    </form>
  </article>
</section>

<footer>
  <p>&copy; 2024 Official Portal - UMPSA Universiti Malaysia Pahang Al-Sultan Abdullah (Malaysia University) - Public University in Pahang. All rights reserved.</p>
</footer>

</body>
</html>


<?php
// Database connection parameters
$servername = "localhost";
$username = "root"; // Update with your database username
$password = ""; // Update with your database password
$dbname = "manage_traffic_summon";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if form was submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = htmlspecialchars($_POST['id']);
    $vehiclePlate = htmlspecialchars($_POST['VehiclePlate']);

    // Fetch summon details based on the input values
    $sql = "SELECT * FROM traffic_summon WHERE id = ? AND vehicle_plate = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("is", $id, $vehiclePlate);
    $stmt->execute();
    $result = $stmt->get_result();

    // Display the summon details
    if ($result->num_rows > 0) {
        echo "<h2>Summon detail</h2>";
        while ($row = $result->fetch_assoc()) {
            echo "<p>Vehicle Plate: " . $row['vehicle_plate'] . "</p>";
            echo "<p>Vehicle Type: " . $row['vehicle_type'] . "</p>";
            echo "<p>Violation Type: " . $row['violation_type'] . "</p>";
            echo "<p>Date / Time: " . $row['datetime'] . "</p>";
            echo "<p>Description: " . $row['description'] . "</p>";
            echo "<p>Demerit Point: " . $row['demerit_point'] . "</p>";
            echo "<hr>";
        }
    } else {
        echo "No records found.";
    }

    $stmt->close();
}

$conn->close();
?>
