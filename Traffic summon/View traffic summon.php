<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>View Traffic Summon</title>
<style>

/* Database to connect with traffic summon data */

  * { box-sizing: border-box; }
  body { font-family: Arial, Helvetica, sans-serif; margin: 0; padding: 0; }
   header { background-color: #3EA99F; padding: 10px; display: flex; align-items: center; justify-content: space-between; font-size: 20px; color: white; }
   header img { margin-right: 15px; }
   header h2 { margin: 0; }
    ul { list-style-type: none; margin: 0; padding: 0; overflow: hidden; }
      li { float: left; }
      li a, .dropbtn { display: inline-block; color: white; text-align: center; padding: 14px 16px; text-decoration: none; }
      li a:hover, .dropdown:hover .dropbtn { background-color: #808080; }
      li.dropdown { display: inline-block; }
        .dropdown-content { display: none; position: absolute; background-color: #f9f9f9; min-width: 160px; box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2); z-index: 1; }
        .dropdown-content a { color: black; padding: 12px 16px; text-decoration: none; display: block; text-align: left; }
        .dropdown-content a:hover { background-color: #f1f1f1; }
        .dropdown:hover .dropdown-content { display: block; }
  article { margin: 20px auto; padding: 20px; width: 70%; background-color: #f1f1f1; border-radius: 10px; box-shadow: 0px 0px 15px rgba(0,0,0,0.2); }
     form { background-color: #ffffff; padding: 20px; border-radius: 10px; box-shadow: 0px 0px 10px rgba(0,0,0,0.1); }
     form label { font-weight: bold; margin-top: 10px; display: block; }
     form input[type="text"], form input[type="radio"] { margin-bottom: 10px; }
     form input[type="text"] { width: calc(100% - 22px); padding: 10px; margin-bottom: 20px; border: 1px solid #ccc; border-radius: 5px; }
     form input[type="radio"] { margin-right: 10px; }
     form input[type="submit"], form input[type="reset"] { background-color: #3EA99F; color: white; border: none; padding: 10px 20px; margin-right: 10px; border-radius: 5px; cursor: pointer; }
     form input[type="submit"]:hover, form input[type="reset"]:hover { background-color: #808080; }
    section::after { content: ""; display: table; clear: both; }
    footer { background-color: #777; padding: 10px; text-align: center; color: white; }
    @media (max-width: 600px) { article { width: 100%; height: auto; } }
      li { border-right: 1px solid #bbb; }
      li:last-child { border-right: none; }
      li a { display: block; color: white; text-align: center; padding: 14px 16px; text-decoration: none; }
      li a:hover:not(.active) { background-color: #808080; }
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
    <li class="dropdown">
      <a href="#tsummon">Traffic Summon</a>
      <div class="dropdown-content">
        <a href="#">Record traffic summon</a>
        <a href="#">View summon</a>
        <a href="#">Summon detail</a>
        <a href="#">User demerit point</a>
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

<article>
  <h2>Summon Info</h2>
  <table>
    <thead>
      <tr>
        <th>ID</th>
        <th>Vehicle Type</th>
        <th>Vehicle Plate</th>
        <th>Violation Type</th>
        <th>Date / Time</th>
      </tr>
    </thead>
    <tbody>
      <?php
       // Database connection settings
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "FKpark";

        // Create connection
        $conn = new mysqli($servername, $username, $password, $dbname);

        // Check connection
        if ($conn->connect_error) {
          die("Connection failed: " . $conn->connect_error);
        }

        // Fetch data from the database
        $sql = "SELECT id, vehicle_type, vehicle_plate, violation_type, datetime FROM traffic_summons";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
          // Output data of each row
          while($row = $result->fetch_assoc()) {
            echo "<tr>
                    <td>" . $row["id"] . "</td>
                    <td>" . $row["vehicle_type"] . "</td>
                    <td>" . $row["vehicle_plate"] . "</td>
                    <td>" . $row["violation_type"] . "</td>
                    <td>" . $row["datetime"] . "</td>
                  </tr>";
          }
        } else {
          echo "<tr><td colspan='5'>No summons found</td></tr>";
        }

        // Close connection
        $conn->close();
      ?>
    </tbody>
  </table>
</article>

<footer>
  <p>Copyright © 2024 Official Portal - UMPSA Universiti Malaysia Pahang Al-Sultan Abdullah (Malaysia University) - Public University in Pahang· All rights reserved</p>
</footer>

</body>
</html>
