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
                      $vehicle_id = htmlspecialchars($_POST['vehicle_id']);
                      $vehicle_type = htmlspecialchars($_POST['vehicle_type']);
                      $vehicle_plate = htmlspecialchars($_POST['vehicle_plate']);

                      // Prepare and bind the SQL statement
                      $stmt = $conn->prepare("INSERT INTO vehicle_info  (vehicle_id, vehicle_type, vehicle_plate) VALUES (?, ?, ?)");
                      $stmt->bind_param("iss", $vehicle_id, $vehicle_type, $vehicle_plate);

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