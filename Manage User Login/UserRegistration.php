<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://getbootstrap.com/docs/5.3/assets/css/docs.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="viewexpert.css">
    <title>FKPark</title>
    <link href="https://png.pngtree.com/png-clipart/20190619/original/pngtree-vector-car-icon-png-image_3989896.jpg" rel="icon">
    <style>
      html, body {
        height: 100%;
        background-color: #3EA99F;
      }
    </style>
  </head>
  <body>
    <section class="vh-100" style="background-color: #3EA99F;">
      <div class="container py-5 h-100">
        <div class="row d-flex justify-content-center align-items-center h-100">
          <div class="col col-xl-10">
            <div class="card h-100" style="border-radius: 1rem;">
              <div class="row g-0 h-100">
                <div class="col-md-6 col-lg-5 d-none d-md-block">
                  <img src="https://i.pinimg.com/originals/2c/d8/9e/2cd89ed550ec3424e2eb3c6e036a1cb7.jpg" alt="login form" class="img-fluid h-100" style="border-radius: 1rem 0 0 1rem; object-fit: cover;" />
                </div>
                <div class="col-xl-6">
                  <div class="card-body p-md-5 text-black">
                    <h3 class="mb-5 text-uppercase">User registration form</h3>

                    <form action="submitreg.blade.php" method="post" enctype="multipart/form-data">

                    <div data-mdb-input-init class="form-outline mb-4">
                      <input type="text" id="user_name" class="form-control form-control-lg" name="user_name" />
                      <label>Full Name</label>
                    </div>

                    <div data-mdb-input-init class="form-outline mb-4">
                      <input type="password" name="user_pw" id="user_pw" class="form-control form-control-lg" />
                      <label>Password</label>
                    </div>


                    <div class="row">
                      <div class="col-md-6 mb-4">
                        <div data-mdb-input-init class="form-outline">
                          <input type="text" name="vehicle_plate" id="vehicle_plate" class="form-control form-control-lg" />
                          <label>Vehicle's number plate</label>
                        </div>
                      </div>

                      <div data-mdb-input-init class="form-outline mb-4">
                        <input type="text" id="vehicle_type" class="form-control form-control-lg" name="vehicle_type" />
                        <label class="form-label">Vehicle Type</label>
                      </div>

                      <div class="col-md-6 mb-4">
                        <div data-mdb-input-init class="form-outline">
                          <input type="text" id="user_id" class="form-control form-control-lg" name="user_id" />
                          <label class="form-label" >Student/Staff ID</label>
                        </div>
                      </div>
                    </div>

                    <div data-mdb-input-init class="form-outline mb-4">
                      <input type="email" id="user_email" class="form-control form-control-lg"  name="user_email"/>
                      <label class="form-label">Email ID</label>
                    </div>


                    <div data-mdb-input-init class="form-outline mb-4">
                      <input type="text" id="user_type" class="form-control form-control-lg" name="user_type" />
                      <label class="form-label">User Type</label>
                    </div>

                    <div data-mdb-input-init class="form-outline mb-4">
                      <input type="text" id="user_address" class="form-control form-control-lg" name="user_address"/>
                      <label class="form-label" >Address</label>
                    </div>

                    <div class="mb-4">
                      <label class="form-label" >Upload Grant</label>
                      <input type="file" id="user_grant" class="form-control form-control-lg" name="user_grant">
                    </div>


                    <div class="pt-1 mb-4">
                      <button class="btn btn-dark btn-lg btn-block" type="submit">Login</button>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
    </form>

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
                      $user_name = htmlspecialchars($_POST['user_name']);
                      $user_pw = htmlspecialchars($_POST['user_pw']);
                      $vehicle_plate = htmlspecialchars($_POST['vehicle_plate']);
                      $vehicle_type = htmlspecialchars($_POST['vehicle_type']);
                      $user_id = htmlspecialchars($_POST['user_id']);
                      $user_email = htmlspecialchars($_POST['user_email']);
                      $user_type = htmlspecialchars($_POST['user_type']);
                      $user_address = htmlspecialchars($_POST['user_address']);
              


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

                  
</body>
</html>

