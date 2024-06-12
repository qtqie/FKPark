<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Add Booking</title>
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
  max-width: 800px;
  background-color: #f1f1f1;
  border-radius: 10px;
  box-shadow: 0px 0px 15px rgba(0,0,0,0.2);
}

/* Form styling */
form {
  display: flex;
  flex-direction: column;
}

label {
  margin-top: 10px;
  font-weight: bold;
}

input[type="text"],
input[type="time"],
input[type="date"],
select {
  padding: 10px;
  margin-top: 5px;
  border: 1px solid #ccc;
  border-radius: 5px;
}

button {
  margin-top: 20px;
  padding: 10px;
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

.qr-code {
  margin: 20px 0;
  text-align: center;
}

.qr-code img {
  width: 200px;
  height: 200px;
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
  <h2>Add Booking</h2>
  <?php if (isset($error_message)) echo $error_message; ?>
  <form action="../Module3/ConfirmBookingPage.php" method="post">

  <label for="name">Name:</label>
      <input type="text" id="name" name="name" value="ABC" required>
      
      <label for="id">ID number:</label>
      <input type="text" id="id_number" name="id_number" value="CXXXXXX" required>

      <label for="parking_area">Choose your parking area:</label>
      <input type="radio" id="A1" name="parking_area" value="A1">
      <label for="A1">A1</label><br>
      <input type="radio" id="A2" name="parking_area" value="A2">
      <label for="A2">A2</label><br>
      <input type="radio" id="A3" name="parking_area" value="A3">
      <label for="A3">A3</label><br>
      <input type="radio" id="B1" name="parking_area" value="B1">
      <label for="B1">B1</label><br>
      <input type="radio" id="B2" name="parking_area" value="B2">
      <label for="B2">B2</label><br>
      <input type="radio" id="B3" name="parking_area" value="B3">
      <label for="B3">B3</label><br><br>

    <label for="car-plate">Car Plate Number:</label>
    <input type="text" id="car-plate" name="car-plate" required>

    <label for="start-time">Start Time:</label>
    <input type="time" id="start-time" name="start-time" required>

    <label for="date">Date:</label>
    <input type="date" id="date" name="date" required>

    <label for="duration">Expected Parking Duration (in hours):</label>
    <input type="text" id="duration" name="duration" required>


    <input type="reset" value="Clear">
    <button type="submit">Confirm Parking</button>
  </form>
</article>

<footer>
  <p>Copyright © 2024 Official Portal - UMPSA Universiti Malaysia Pahang Al-Sultan Abdullah (Malaysia University) - Public University in Pahang· All rights reserved</p>
</footer>

</body>
</html>
