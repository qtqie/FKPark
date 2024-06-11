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

                  // Check if form was submitted
                  if ($_SERVER["REQUEST_METHOD"] == "POST") {
                      // Retrieve the form data
                      if (isset($_POST["user_name"]))
                      $user_name = $_POST['user_name'];
                      if (isset($_POST["user_pw"]))
                      $user_pw = $_POST['user_pw'];
                      if (isset($_POST["vehicle_plate"]))
                      $vehicle_plate = $_POST['vehicle_plate'];
                      if (isset($_POST["vehicle_type"]))
                      $vehicle_type = $_POST['vehicle_type'];
                      if (isset($_POST["user_id"]))
                      $user_id = $_POST['user_id'];
                      if (isset($_POST["user_email"]))
                      $user_email = $_POST['user_email'];
                      if (isset($_POST["user_type"]))
                      $user_type = $_POST['user_type'];
                      if (isset($_POST["user_address"]))
                      $user_address = $_POST['user_address'];
        


                      // Prepare and bind the SQL statement
                      $stmt = $conn->prepare("INSERT INTO registration  (user_name, user_pw, vehicle_plate, vehicle_type, user_id, user_email, user_type, user_address) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
                      $stmt->bind_param("ssssssss", $user_name, $user_pw, $vehicle_plate, $vehicle_type, $user_id, $user_email, $user_type, $user_address);

                      // Execute the statement and check for success
                      if ($stmt->execute()) {
                          echo "New record created successfully";
                      } else {
                          echo "Error: " . $stmt->error;
                      }

                      // Close the statement and connection
                      $stmt->close();
                      $conn->close();

                    
                  }
                  ?>