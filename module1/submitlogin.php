<?php
                  // Database connection parameters
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

                  ?>

                  
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Succefully</title>
<style>
body {
    background-color: #40E0D0;
    background-image: url('https://industrytoday.com/wp-content/uploads/2022/12/design-car-park.jpg');
    background-size: cover;
    background-repeat: no-repeat;
    margin: 0;
    height: 100vh; /* Full viewport height */
    display: flex;
    justify-content: center; /* Center horizontally */
    align-items: center; /* Center vertically */
}

button {
    padding: 40px 80px; /* Adjust padding for better appearance */
    background-color: #3EA99F;
    color: white;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    font-size: 20px; /* Increase font size for better readability */
    
}

button:hover {
    background-color: #808080;
}
</style>
</head>
<body>
    
    

<p><a href="userDashboard.blade.php"><button>Welcome </button></a></p>

</body>
</html>