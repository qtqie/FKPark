<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Checkout</title>
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
        <a href="#">Create Park</a>
        <a href="#">Update Park</a>
        <a href="#">Delete Park</a>
        <a href="#">View Park</a>
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
  <h2>Checkout Booking</h2>

  <div>
    <p>Review your booking details and proceed to complete the booking:</p>
    <table>
    <tr>
        <td><strong>Name:</strong></td>
        <td><?php echo htmlspecialchars($_POST['name']); ?></td>
      </tr>
    <tr>
        <td><strong>ID Number:</strong></td>
        <td><?php echo htmlspecialchars($_POST['id_number']); ?></td>
      </tr>
      <tr>
        <td><strong>Parking Area:</strong></td>
        <td><?php echo htmlspecialchars($_POST['parking_area']); ?></td>
      </tr>
      <tr>
        <td><strong>Car Plate Number:</strong></td>
        <td><?php echo htmlspecialchars($_POST['car-plate']); ?></td>
      </tr>
      <tr>
        <td><strong>Date:</strong></td>
        <td><?php echo htmlspecialchars($_POST['date']); ?></td>
      </tr>
      <tr>
        <td><strong>Start Time:</strong></td>
        <td><?php echo htmlspecialchars($_POST['start-time']); ?></td>
      </tr>
      <tr>
        <td><strong>Expected Parking Duration (in hours):</strong></td>
        <td><?php echo htmlspecialchars($_POST['duration']); ?></td>
      </tr>
    </table>
  </div>

 <div class="qr-code">
    <p>Scan this QR code for booking reference:</p>
    <img src="https://api.qrserver.com/v1/create-qr-code/?size=200x200&data=https%3A%2F%2Fexample.com%2FBookingReference.php%3Freference%3D123456789" alt="QR Code">
</div>


  <button onclick="completeBooking()">Complete Booking</button>

  <script>
  function completeBooking() {
    // Redirect to a page that handles the booking completion
    window.location.href = "BookingSuccessful.php";
  }
  </script>
</article>

<footer>
  <p>Copyright © 2024 Official Portal - UMPSA Universiti Malaysia Pahang Al-Sultan Abdullah (Malaysia University) - Public University in Pahang· All rights reserved</p>
</footer>

</body>
</html>
