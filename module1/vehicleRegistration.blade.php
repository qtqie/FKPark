<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Vehicle Registration</title>
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

/* Form styling */
form {
  display: flex;
  flex-direction: column;
}

label {
  margin-top: 10px;
}

input, select, button {
  margin-top: 5px;
  padding: 10px;
  border: 1px solid #ccc;
  border-radius: 5px;
}

button {
  background-color: #3EA99F;
  color: white;
  border: none;
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
    <img src="data:image/png;base64,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" alt="UMPLogo" style="width:75px;height:86px;">
    <h2>FKPark</h2>
  </div>
  <ul>
    <li><a class="active" href="homepage.blade.php">Home</a></li>

    <li class="dropdown">
      <a href="booking" class="dropbtn">Booking</a>
      <div class="dropdown-content">
        <a href="Addbooking.php">Add Booking</a>
        <a href="ViewBooking.php">View Booking</a>
      </div>
    </li>

    <li class="dropdown">
      <a href="ManageProfile" class="dropbtn">Profile</a>
      <div class="dropdown-content">
        <a href="studentpage.blade.php">Manage User Profile</a>
        <a href="vehicleRegistration.blade.php">Manage Vehicle Information</a>
        <a href="userDashboard.blade.php">User Dashboard</a>
      </div>
    </li>

    <li><a href="#tsummon">Traffic Summon</a></li>


    <li class="dropdown">
      <a href="Parkingsetting" class="dropbtn">Parking Setting</a>
      <div class="dropdown-content">
        <a href="#">Create Park</a>
        <a href="#">Update Park</a>
        <a href="#">Delete Park</a>
        <a href="#">View Park</a>
      </div>
    </li>

    <li><a href="#help">Help</a></li>

    </li>
  </ul>
</header>

<article>
  <h2>Vehicle Registration</h2>
  <form action="submitvehicle.php" method="post" enctype="multipart/form-data">
    <label for="vehicle_id">Vehicle ID:</label>
    <input type="text" id="vehicle_id" name="vehicle_id" required>

    <label for="vehicle_type">Vehicle Type:</label>
    <input type="text" id="vehicle_type" name="vehicle_type" required>

    <label for="vehicle_plate">Vehicle Number Plate:</label>
    <input type="text" id="vehicle_plate" name="vehicle_plate" required>

    <label for="grant">Upload Vehicle Grant:</label>
    <input type="file" id="grant" name="grant" accept=".pdf,.jpg,.jpeg,.png" required>

    <button type="submit">Register Vehicle</button>
    <button onclick="window.location.href='viewvehicle.php';">Go to Edit Page</button>
  </form>
 
  <?php


    $target_dir = "uploads/";
    $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

      // Check if file already exists
    if (file_exists($target_file)) {
         echo "Sorry, file already exists.";
         $uploadOk = 0;
          }

      // Check file size
    if ($_FILES["fileToUpload"]["size"] > 500000) {
        echo "Sorry, your file is too large.";
        $uploadOk = 0;
      }

     // Allow certain file formats
     if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
       && $imageFileType != "gif" ) {
      echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
       $uploadOk = 0;
       }

     // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
      echo "Sorry, your file was not uploaded.";
    // if everything is ok, try to upload file
    } else {
        if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
          echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
       } else {
          echo "Sorry, there was an error uploading your file.";
      }
    }
  ?>


</article>

<footer>
  <p>Copyright © 2024 Official Portal - UMPSA Universiti Malaysia Pahang Al-Sultan Abdullah (Malaysia University) - Public University in Pahang· All rights reserved</p>
</footer>

</body>
</html>
