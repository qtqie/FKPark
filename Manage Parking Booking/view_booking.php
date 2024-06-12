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

// Fetch bookings from the database
$sql = "SELECT * FROM bookings";
$result = $conn->query($sql);
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
    <img src="../Assets/UMPLogo.jpeg" alt="UMPLogo" style="width:75px;height:86px;">
    <h2>FKPark</h2>
  </div>
  <ul>
    <li><a class="active" href="homepage.blade.php">Home</a></li>
    <li class="dropdown">
      <a href="../Module3/AddBooking.php" class="dropbtn">Booking</a>
      <div class="dropdown-content">
      <a href="../Module3/ddBooking.php">Add Booking</a>
        <a href="../Module3/view_booking.php">View My Booking</a>
        <a href="../Module3/ViewBooking.php">View Available Parking</a>
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
        <a href="registration.blade.php">Sign Up</a>
        <a href="LoginPage.php">Log In</a>
      </div>
    </li>
  </ul>
</header>

<h2>View My Bookings</h2>

<?php
if ($result->num_rows > 0) {
    echo "<table style='width:100%; border-collapse: collapse;'>";
    echo "<thead>";
    echo "<tr style='background-color: #f2f2f2;'>";
    echo "<th style='border: 1px solid #ddd; padding: 8px;'>Name</th>";
    echo "<th style='border: 1px solid #ddd; padding: 8px;'>ID Number</th>";
    echo "<th style='border: 1px solid #ddd; padding: 8px;'>Parking Area</th>";
    echo "<th style='border: 1px solid #ddd; padding: 8px;'>Car Plate Number</th>";
    echo "<th style='border: 1px solid #ddd; padding: 8px;'>Date</th>";
    echo "<th style='border: 1px solid #ddd; padding: 8px;'>Start Time</th>";
    echo "<th style='border: 1px solid #ddd; padding: 8px;'>Expected Parking Duration (in hours)</th>";
    echo "<th style='border: 1px solid #ddd; padding: 8px;'>Actions</th>";
    echo "</tr>";
    echo "</thead>";
    echo "<tbody>";

    // Output data of each row
    while($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td style='border: 1px solid #ddd; padding: 8px;'>" . htmlspecialchars($row["name"]) . "</td>";
        echo "<td style='border: 1px solid #ddd; padding: 8px;'>" . htmlspecialchars($row["id_number"]) . "</td>";
        echo "<td style='border: 1px solid #ddd; padding: 8px;'>" . htmlspecialchars($row["parking_area"]) . "</td>";
        echo "<td style='border: 1px solid #ddd; padding: 8px;'>" . htmlspecialchars($row["car_plate"]) . "</td>";
        echo "<td style='border: 1px solid #ddd; padding: 8px;'>" . htmlspecialchars($row["date"]) . "</td>";
        echo "<td style='border: 1px solid #ddd; padding: 8px;'>" . htmlspecialchars($row["start_time"] ?? 'N/A') . "</td>";
        echo "<td style='border: 1px solid #ddd; padding: 8px;'>" . htmlspecialchars($row["duration"]) . "</td>";
        echo "<td style='border: 1px solid #ddd; padding: 8px;'>";
        echo "<a href='edit_booking.php?id=" . htmlspecialchars($row["id"]) . "' style='text-decoration: none; color: #007BFF;'>Edit</a> | ";
        echo "<a href='delete_booking.php?id=" . htmlspecialchars($row["id"]) . "' style='text-decoration: none; color: #FF0000;' onclick='return confirm(\"Are you sure you want to delete this booking?\")'>Delete</a>";
        echo "</td>";
        echo "</tr>";
    }
    echo "</tbody>";
    echo "</table>";
} else {
    echo "<p>No bookings found.</p>";
}
$conn->close();
?>

<p style="display: flex; gap: 10px;">
    <a href="homepage.blade.php">
        <button style='padding: 10px 20px; background-color: #3EA99F; color: white; border: none; border-radius: 5px;'>Back to Home</button>
    </a>
    <a href="../Module3/AddBooking.php">
        <button style='padding: 10px 20px; background-color: #3EA99F; color: white; border: none; border-radius: 5px;'>Add Booking</button>
    </a>
</p>


<footer>
  <p>Copyright © 2024 Official Portal - UMPSA Universiti Malaysia Pahang Al-Sultan Abdullah (Malaysia University) - Public University in Pahang. All rights reserved.</p>
</footer>

</body>
</html>
