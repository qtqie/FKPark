<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>User Demerit Point</title>
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

form input[type="text"], form input[type="number"], form select {
  width: calc(100% - 22px);
  padding: 10px;
  margin-bottom: 20px;
  border: 1px solid #ccc;
  border-radius: 5px;
}

form input[type="submit"], form input[type="reset"], button {
  background-color: #3EA99F;
  color: white;
  border: none;
  padding: 10px 20px;
  margin-right: 10px;
  border-radius: 5px;
  cursor: pointer;
}

form input[type="submit"]:hover, form input[type="reset"]:hover, button:hover {
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

/* Table style */
table {
  width: 100%;
  border-collapse: collapse;
  margin: 0 auto;
  background-color: white;
  box-shadow: 0px 0px 15px rgba(0,0,0,0.1);
}

th, td {
  border: 1px solid #ddd;
  padding: 10px;
  text-align: center;
}

th {
  background-color: #3EA99F;
  color: white;
}

.event {
  background-color: #3EA99F;
  color: white;
  border-radius: 5px;
  padding: 5px;
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
    <li class="dropdown">
      <a href="#tsummon" class="dropbtn">Traffic Summon</a>
      <div class="dropdown-content">
        <a href="#">Record Traffic Summon</a>
        <a href="#">View Summon</a>
        <a href="#">Summon Detail</a>
        <a href="#">User Demerit Point</a>
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
    <form action="#" method="post">
      <div>
        <label for="User">User:</label>
        <input type="text" id="User" name="User">
      </div>
      
      <div>
        <label for="ID">ID:</label>
        <input type="text" id="ID" name="ID">
      </div>

      <h2>Registration Vehicle</h2>

      <table>
        <thead>
          <tr>
            <th>ID</th>
            <th>Vehicle Type</th>
            <th>Plate</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td></td>
            <td><div class="event">Event 1</div></td>
            <td></td>
          </tr>
          <tr>
            <td></td>
            <td></td>
            <td><div class="event">Event 3</div></td>
          </tr>
          <tr>
            <td></td>
            <td></td>
            <td></td>
          </tr>
          <!-- Add more rows as needed -->
        </tbody>
      </table>

      <h2>Summon History</h2>

      <table>
        <thead>
          <tr>
            <th>ID</th>
            <th>Violation</th>
            <th>Date / Time</th>
            <th>Point</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td></td>
            <td><div class="event">Event 1</div></td>
            <td></td>
            <td><div class="event">Event 2</div></td>
          </tr>
          <tr>
            <td></td>
            <td></td>
            <td><div class="event">Event 3</div></td>
            <td></td>
          </tr>
          <tr>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
          </tr>
          <!-- Add more rows as needed -->
        </tbody>
      </table>

      <div>
        <label for="total_demerit_point">Total Demerit Point:</label>
        <input type="number" id="total_demerit_point" name="total_demerit_point">
      </div>
      
      <div>
        <label for="enforcement">Enforcement Status:</label>
        <input type="text" id="enforcement" name="enforcement">
      </div>
      
      <br>
      <div>
        <button type="button" onclick="back()">Back</button>
      </div>
      
    </form>
  </article>
</section>

<script>
function back() {
  alert('Edit functionality to be implemented.');
}
</script>

<footer>
  <p>&copy; 2024 Official Portal - UMPSA Universiti Malaysia Pahang Al-Sultan Abdullah (Malaysia University) - Public University in Pahang. All rights reserved.</p>
</footer>

</body>
</html>