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

if (isset($_POST['session']) && is_array($_POST['session'])) {
  $stmt = $conn->prepare("INSERT INTO parking (session, carplatenumber, parkingstarttime, parkingendtime, duration, availability) VALUES (?, ?, ?, ?, ?, ?)");
  $stmt->bind_param("ssssss", $session, $carplatenumber, $parkingstarttime, $parkingendtime, $duration, $availability);

  // Loop through the table rows
  for ($i = 0; $i < count($_POST['session']); $i++) {
      $session = $_POST['session'][$i] ?? '';
      $carplatenumber = $_POST['carplatenumber'][$i] ?? '';
      $parkingstarttime = $_POST['parkingstarttime'][$i] ?? '';
      $parkingendtime = $_POST['parkingendtime'][$i] ?? '';
      $duration = $_POST['duration'][$i] ?? '';
      $availability = $_POST['availability'][$i] ?? '';
      $stmt->execute();
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
<title>View Bookings</title>
<style>
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
}

li a, .dropbtn {
  display: inline-block;
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

table {
    width: 100%;
    border-collapse: collapse;
    margin-top: 20px;
}

table, th, td {
    border: 1px solid #ccc;
}

th, td {
    padding: 10px;
    text-align: left;
}

th {
    background-color: #3EA99F;
    color: white;
}

tr:nth-child(even) {
    background-color: #f2f2f2;
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

/* Style the footer */
footer {
  background-color: #777;
  padding: 10px;
  text-align: center;
  color: white;
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
      <a href="createparkingspace.php">Create Park</a>
        <a href="updateparking.php">Update Park</a>
        <a href="deleteparking.php">Delete Park</a>
        <a href="submitupdateparking.php">View Park</a>
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
<h2>View Parking </h2>

<?php
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch parking spaces from the database
$sql = "SELECT  Session, carplatenumber, Parkingstarttime, Parkingendtime, duration, Availability FROM parking";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<table><tr><th>Session</th><th>carplatenumber</th><th>Parkingstarttime</th><th>Parkingendtime</th><th>duration</th><th>Availability</th></tr>";
    // Output data of each row
    while($row = $result->fetch_assoc()) {
        echo "<tr><td>" . $row["Session"] . "</td><td>" . $row["carplatenumber"] . "</td><td>" . $row["Parkingstarttime"] . "</td><td>" . $row["Parkingendtime"] . "</td><td>" . $row["duration"] . "</td><td>" . $row["Availability"] . "</td></tr>";
    }
    echo "</table>";
} else {
    echo "No parking spaces found.";
}

$conn->close();
?>

<p><a href="updateparking.php"><button>Back to Home</button></a></p>

<footer>
  <p>Copyright © 2024 Official Portal - UMPSA Universiti Malaysia Pahang Al-Sultan Abdullah (Malaysia University) - Public University in Pahang· All rights reserved</p>
</footer>

</body>
</html>