<?php
// Database connection parameters
$servername = "localhost";
$username = "root"; 
$password = ""; 
$dbname = "manage_traffic_summon";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$vehiclePlate = "";
$vehicleType = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve and sanitize input data from Coding 1
    $vehiclePlate = htmlspecialchars($_POST['VehiclePlate']);
    $vehicleType = htmlspecialchars($_POST['Vehicle_Type']);

    // Check if this is the final form submission
    if (isset($_POST['ViolationType'])) {
        $violationType = htmlspecialchars($_POST['ViolationType']);
        $datetime = htmlspecialchars($_POST['datetime']);
        $description = htmlspecialchars($_POST['Description']);
        $demeritPoint = htmlspecialchars($_POST['DemeritPoint']);

        // Prepare and bind parameters
        $stmt = $conn->prepare("INSERT INTO trafficsummon (vehicle_plate, vehicle_type, violation_type, datetime, description, demerit_point) VALUES (?, ?, ?, ?, ?, ?)");
        if ($stmt === false) {
            die("Prepare failed: " . htmlspecialchars($conn->error));
        }

        $stmt->bind_param("sssssi", $vehiclePlate, $vehicleType, $violationType, $datetime, $description, $demeritPoint);
        if ($stmt->execute()) {
            header("Location: ViewTrafficSummon.php");
            exit();
        } else {
            echo "Execute failed: " . htmlspecialchars($stmt->error);
        }

        $stmt->close();
    }
}

$conn->close();
?>




<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Insert Summon Detail</title>
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

      li a,
      .dropbtn {
        display: inline-block;
        color: white;
        text-align: center;
        padding: 14px 16px;
        text-decoration: none;
      }

      li a:hover,
      .dropdown:hover .dropbtn {
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
        box-shadow: 0px 8px 16px 0px rgba(0, 0, 0, 0.2);
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
        width: 70%;
        background-color: #f1f1f1;
        border-radius: 10px;
        box-shadow: 0px 0px 15px rgba(0, 0, 0, 0.2);
      }

      form {
        background-color: #ffffff;
        padding: 20px;
        border-radius: 10px;
        box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
      }

      form label {
        font-weight: bold;
        margin-top: 10px;
        display: block;
      }

      form input[type="text"],
      form input[type="datetime-local"],
      form input[type="number"],
      form select {
        width: calc(100% - 22px);
        padding: 10px;
        margin-bottom: 20px;
        border: 1px solid #ccc;
        border-radius: 5px;
      }

      form input[type="submit"],
      form input[type="reset"],
      button {
        background-color: #3EA99F;
        color: white;
        border: none;
        padding: 10px 20px;
        margin-right: 10px;
        border-radius: 5px;
        cursor: pointer;
      }

      form input[type="submit"]:hover,
      form input[type="reset"]:hover,
      button:hover {
        background-color: #808080;
      }

      section::after {
        content: "";
        display: table;
        clear: both;
      }

      footer {
        background-color: #777;
        padding: 10px;
        text-align: center;
        color: white;
      }

      @media (max-width: 600px) {
        article {
          width: 100%;
          height: auto;
        }
      }

      li {
        border-right: 1px solid #bbb;
      }

      li:last-child {
        border-right: none;
      }

      li a {
        display: block;
        color: white;
        text-align: center;
        padding: 14px 16px;
        text-decoration: none;
      }

      li a:hover:not(.active) {
        background-color: #808080;
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
      <a href="../module4/TrafficSummonDashboard.php">Traffic Summon Dashboard</a>
        <a href="../module4/InsertSummonDetail.php">Insert Summon Detail</a>
        <a href="../module4/ViewTrafficSummon.php">View Summon</a>
        <a href="../module4/UserDemeritPoint.php">User Demerit Point</a>
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
<form id="summonForm" action="" method="post">
    <div>
        <label for="VehiclePlate">Vehicle Plate:</label>
        <input type="text" id="VehiclePlate" name="VehiclePlate" value="<?php echo $vehiclePlate; ?>" required> 
    </div>
    <div>
        <label for="VehicleType">Vehicle Type:</label>
        <select id="VehicleType" name="VehicleType" required>
            <option value="Car" <?php if ($vehicleType == 'Car') echo 'selected'; ?>>Car</option>
            <option value="Motorcycle" <?php if ($vehicleType == 'Motorcycle') echo 'selected'; ?>>Motorcycle</option>
        </select>
    </div>
    <div>
        <label for="ViolationType">Violation Type:</label>
        <input type="text" id="ViolationType" name="ViolationType" required> 
    </div>
    <div>
        <label for="datetime">Date / Time:</label>
        <input type="datetime-local" id="datetime" name="datetime" required> 
    </div>
    <div>
        <label for="Description">Description:</label>
        <input type="text" id="Description" name="Description"> 
    </div>
    <div>
        <label for="DemeritPoint">Demerit Point:</label>
        <input type="number" id="DemeritPoint" name="DemeritPoint" required> 
    </div>
    <div>
        <button type="submit">Create</button> 
    </div>
</form>
    </article>
</section>
<script>
    const datetimeInput = document.getElementById('datetime');
    datetimeInput.value = new Date().toISOString().slice(0, 16);

    function create() {
        document.getElementById('summonForm').action = 'ViewTrafficSummon.php';
        document.getElementById('formAction').value = 'create';
        document.getElementById('summonForm').submit();
    }
</script>
<footer>
    <p>Copyright © 2024 Official Portal - UMPSA Universiti Malaysia Pahang Al-Sultan Abdullah (Malaysia University) - Public University in Pahang· All rights reserved</p>
</footer>
</body>
</html>