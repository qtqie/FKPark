<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Booking Confirmation</title>
<style>
* {
  box-sizing: border-box;
}
body {
  font-family: Arial, Helvetica, sans-serif;
  margin: 0;
  padding: 0;
}

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

article {
  margin: 20px auto;
  padding: 20px;
  width: 80%;
  background-color: #f1f1f1;
  border-radius: 10px;
  box-shadow: 0px 0px 15px rgba(0,0,0,0.2);
}

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
  <h2>Booking Confirmation</h2>

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

  if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve the form data
    $name = htmlspecialchars($_POST['name']);
    $id_number = htmlspecialchars($_POST['id_number']);
    $parking_area = htmlspecialchars($_POST['parking_area']);
    $car_plate = htmlspecialchars($_POST['car-plate']);
    $start_time = htmlspecialchars($_POST['start-time']);
    $date = htmlspecialchars($_POST['date']);
    $duration = htmlspecialchars($_POST['duration']);

// Prepare and bind
$stmt = $conn->prepare("INSERT INTO bookings (name, id_number, parking_area, car_plate, start_time, date, duration) VALUES (?, ?, ?, ?, ?, ?, ?)");
$stmt->bind_param("sssssss", $name, $id_number, $parking_area, $car_plate, $start_time, $date, $duration);

 // Execute the statement
 if ($stmt->execute()) {
  echo "New booking created successfully";
} else {
  echo "Error: " . $stmt->error;
}

// Close the statement and connection
$stmt->close();
$conn->close();
} else {
echo "Invalid request method.";
}

  ?>
    <div>
      <p>Please confirm your booking information:</p>
      <table>
        <tr>
          <td><strong>Name:</strong></td>
          <td><?php echo $name; ?></td>
        </tr>
        <tr>
          <td><strong>ID Number:</strong></td>
          <td><?php echo $id_number; ?></td>
        </tr>
        <tr>
          <td><strong>Parking Area:</strong></td>
          <td><?php echo $parking_area; ?></td>
        </tr>
        <tr>
          <td><strong>Car Plate Number:</strong></td>
          <td><?php echo $car_plate; ?></td>
        </tr>
        <tr>
          <td><strong>Start Time:</strong></td>
          <td><?php echo $start_time; ?></td>
        </tr>
        <tr>
          <td><strong>Date:</strong></td>
          <td><?php echo $date; ?></td>
        </tr>
        <tr>
          <td><strong>Duration (hours):</strong></td>
          <td><?php echo $duration; ?></td>
        </tr>
      </table>
    </div>

    <form action="../Module3/CheckOutBooking.php" method="post">
      <input type="hidden" name="name" value="<?php echo $name; ?>">
      <input type="hidden" name="id_number" value="<?php echo $id_number; ?>">
      <input type="hidden" name="parking_area" value="<?php echo $parking_area; ?>">
      <input type="hidden" name="car-plate" value="<?php echo $car_plate; ?>">
      <input type="hidden" name="start-time" value="<?php echo $start_time; ?>">
      <input type="hidden" name="date" value="<?php echo $date; ?>">
      <input type="hidden" name="duration" value="<?php echo $duration; ?>">
      <button type="submit">Proceed to Checkout</button>
    </form>

 
</article>

<footer>
  <p>Copyright © 2024 Official Portal - UMPSA Universiti Malaysia Pahang Al-Sultan Abdullah (Malaysia University) - Public University in Pahang· All rights reserved</p>
</footer>

</body>
</html>
