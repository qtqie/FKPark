<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>View Parking</title>
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
  background-color: #f1f1f1;
  border-radius: 10px;
  box-shadow: 0px 0px 15px rgba(0,0,0,0.2);
}

/* Table styling */
table {
  width: 100%;
  border-collapse: collapse;
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

/* Change background color for specific header cells */
th.date, th.start-time, th.end-time {
  background-color: #3EA99F; /* Your desired color */
}

tr:nth-child(even) {
  background-color: #f2f2f2;
}

/* Style the footer */
footer {
  background-color: #777;
  padding: 10px;
  text-align: center;
  color: white;
}

/* Change background color for specific content cells */
td.date, td.start-time, td.end-time {
  background-color: white; /* Change to white color */
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
      <a href="booking" class="dropbtn">Booking</a>
      <div class="dropdown-content">
        <a href="Addbooking.php">Add Booking</a>
        <a href="ViewBooking.php">View Booking</a>
      </div>
    </li>

    <li><a href="#tsummon">Traffic Summon</a></li>

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

<article>
  <h2>View Parking</h2>
  <form method="post">
    <label for="status">Filter by Status:</label>
    <select name="Status" id="Status">
        <option value="all">All Parking</option>
        <option value="Available">Available Parking</option>
    </select>
    <button type="submit">Filter</button>
</form>

  </form>
  <table>
    <thead>
      <tr>
        <th>Parking ID</th>
        <th>Area</th>
        <th>Spot Number</th>
        <th>Status</th>
        <th>Actions</th>
      </tr>
    </thead>
    <tbody>
    <?php
      // Include the PHP file to connect to the database
      include 'parkingsubmit.php';

      // Fetch data from the database
      $parkingspots = parking_spots();

      // Output data of each row
      foreach ($parkingspots as $spot) {
          echo "<tr>";
          echo "<td>" . $spot['parking_id'] . "</td>";
          echo "<td>" . $spot['area'] . "</td>";
          echo "<td>" . $spot['spot_number'] . "</td>";
          echo "<td>" . $spot['status'] . "</td>";
          echo "<td><a href='ParkingBooking.php'><button>Book</button></a></td>";
          echo "</tr>";
      }
      ?>
    </tbody>
  </table>
</article>

<footer>
  <p>Copyright © 2024 Official Portal - UMPSA Universiti Malaysia Pahang Al-Sultan Abdullah (Malaysia University) - Public University in Pahang· All rights reserved</p>
</footer>

</body>
</html>
