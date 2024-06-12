<?php
// Database credentials
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "fkpark_db";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if (isset($_POST['submit'])) {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $id_number = $_POST['id_number'];
    $parking_area = $_POST['parking_area'];
    $car_plate = $_POST['car_plate'];
    $start_time = $_POST['start_time'];
    $date = $_POST['date'];
    $duration = $_POST['duration'];

    $sql = "UPDATE bookings SET name='$name', id_number='$id_number', parking_area='$parking_area', car_plate='$car_plate', start_time='$start_time', date='$date', duration='$duration' WHERE id=$id";

    if ($conn->query($sql) === TRUE) {
        echo "Record updated successfully";
        header("Location: ViewBooking.php");
    } else {
        echo "Error updating record: " . $conn->error;
    }
}

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "SELECT * FROM bookings WHERE id=$id";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
    } else {
        echo "No record found";
    }
} else {
    header("Location: view_booking.php");
}

$conn->close();
?>

<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Edit Booking</title>
<style>
* {
  box-sizing: border-box;
}
body {
  font-family: Arial, Helvetica, sans-serif;
  margin: 0;
  padding: 0;
  background-color: #f4f4f4;
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

/* Main content */
article {
  margin: 20px auto;
  padding: 20px;
  width: 80%;
  background-color: #fff;
  border-radius: 10px;
  box-shadow: 0px 0px 15px rgba(0,0,0,0.2);
}

/* Form styling */
form {
  max-width: 600px;
  margin: 0 auto;
}

form label {
  font-weight: bold;
  display: block;
  margin-top: 10px;
}

form input[type="text"], form input[type="date"], form input[type="time"], form input[type="number"] {
  width: 100%;
  padding: 8px;
  margin: 5px 0 20px 0;
  display: inline-block;
  border: 1px solid #ccc;
  border-radius: 4px;
  box-sizing: border-box;
}

form input[type="submit"] {
  width: 100%;
  background-color: #3EA99F;
  color: white;
  padding: 10px;
  margin-top: 20px;
  border: none;
  border-radius: 4px;
  cursor: pointer;
}

form input[type="submit"]:hover {
  background-color: #3e8e41;
}

.button {
  width: 100%;
  padding: 10px;
  font-size: 16px;
  cursor: pointer;
  text-align: center;
  text-decoration: none;
  outline: none;
  color: white;
  background-color: #3EA99F;
  border: none;
  border-radius: 10px;
  box-shadow: 0 4px #999;
  margin-top: 20px;
}

.button:hover {
  background-color: #3e8e41;
}

.button:active {
  background-color: #3e8e41;
  box-shadow: 0 2px #666;
  transform: translateY(2px);
}

/* Style the footer */
footer {
  background-color: #777;
  padding: 10px;
  text-align: center;
  color: white;
  margin-top: 20px;
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
      <a href="../Module3/AddBooking.php">Add Booking</a>
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

<article>
<h2>Edit Booking</h2>

<form method="post" action="../Module3/edit_booking.php">
    <input type="hidden" name="id" value="<?php echo htmlspecialchars($row['id']); ?>">
    
    <label for="name">Name:</label>
    <input type="text" id="name" name="name" value="<?php echo htmlspecialchars($row['name']); ?>">
    
    <label for="id_number">ID Number:</label>
    <input type="text" id="id_number" name="id_number" value="<?php echo htmlspecialchars($row['id_number']); ?>">
    
    <label for="parking_area">Parking Area:</label>
    <input type="text" id="parking_area" name="parking_area" value="<?php echo htmlspecialchars($row['parking_area']); ?>">
    
    <label for="car_plate">Car Plate Number:</label>
    <input type="text" id="car_plate" name="car_plate" value="<?php echo htmlspecialchars($row['car_plate']); ?>">
    
    <label for="date">Date:</label>
    <input type="date" id="date" name="date" value="<?php echo htmlspecialchars($row['date']); ?>">
    
    <label for="start_time">Start Time:</label>
    <input type="time" id="start_time" name="start_time" value="<?php echo htmlspecialchars($row['start_time']); ?>">
    
    <label for="duration">Expected Parking Duration (in hours):</label>
    <input type="number" id="duration" name="duration" value="<?php echo htmlspecialchars($row['duration']); ?>">
    
    <input type="submit" name="submit" value="Update">
</form>

<p><a href="../Module3/view_booking.php"><button class="button">Back to View My Bookings</button></a></p>
</article>

<footer>
  <p>Copyright © 2024 Official Portal - UMPSA Universiti Malaysia Pahang Al-Sultan Abdullah (Malaysia University) - Public University in Pahang· All rights reserved</p>
</footer>

</body>
</html>
