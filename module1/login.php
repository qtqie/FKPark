<?php
session_start(); // Start the session
include("dbase.php");

function validateUser($conn, $userID, $userPassword, $user_role) {
    // Sanitize and validate input data
    $user_id = mysqli_real_escape_string($conn, $user_id);
    $user_pw = mysqli_real_escape_string($conn, $user_pw);
    $user_role = mysqli_real_escape_string($conn, $user_role);
    

    // Fetch userID from login based on username, password, and category
    $query = "SELECT user_id FROM login WHERE user_id='$user_id' AND user_pw='$user_pw' AND userRole='$user_role'";
    $result = mysqli_query($conn, $query);

    if ($result && mysqli_num_rows($result) == 1) {
        $row = mysqli_fetch_assoc($result);
        return $row['user_id'];
    } else {
        return false;
    }
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['login'])) {
    $userID = $_POST['user_id'];
    $userPassword = $_POST['user_pw'];
    $userRole = $_POST['user_role'];

    // Validate user credentials
    $userID = validateUser($conn, $user_id, $user_pw, $user_role);

    if ($userID) {
        $_SESSION['user_id'] = $user_id; // Store userID in session

        // Redirect based on category
        if ($userRole == "Administrator") {
            header("Location: adminpage.php");
            exit();
        } elseif ($userRole == "staff") {
            header("Location: staffpage.php");
            exit();
        } elseif ($userRole == "student") {
            header("Location: studentpage.php");
            exit();
        } else {
            echo "<div class='text-center text-danger'>Please select a valid category.</div>";
        }
    } else {
        echo "<div class='text-center text-danger'>Invalid username, password, or category.</div>";
    }
}
?>
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
</head>
<body>
  <section class="vh-100" style="background-color: #40E0D0;">
    <div class="container py-5 h-100">
      <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col col-xl-10">
          <div class="card h-100" style="border-radius: 1rem;">
            <div class="row g-0 h-100">
              <div class="col-md-6 col-lg-5 d-none d-md-block">
                <img src="https://www.thenbs.com/-/media/uk/new-images/by-section/knowledge/knowledge-articles-hero/multi-storey-car-park.jpg" alt="login form" class="img-fluid h-100" style="border-radius: 1rem 0 0 1rem; object-fit: cover;" />
              </div>
              <div class="col-md-6 col-lg-7 d-flex align-items-center h-100">
                <div class="card-body p-4 p-lg-5 text-black">

                  <form class="w-100" action="submitlogin.php" method="POST">

                    <div class="d-flex align-items-center mb-3 pb-1">
                      <i class="fas fa-cubes fa-2x me-3" style="color: #ff6219;"></i>
                      <span class="h1 fw-bold mb-0">FKPark</span>
                    </div>

                    <h5 class="fw-normal mb-3 pb-3" style="letter-spacing: 1px;">Sign into your account</h5>

                    <div class="form-outline mb-4">
                    <label class="form-label" for="user_id">User ID</label>
                      <input type="text" id="user_id" name="user_id" class="form-control form-control-lg" required />
                    </div>

                    <div class="form-outline mb-4">
                    <label class="form-label" for="user_pw">Password</label>
                      <input type="password" id="user_pw" name="user_pw" class="form-control form-control-lg" required />
                    </div>

                    <div class="form-outline mb-4">
                    <label class="form-label" for="user_id">User Role</label>
                <select class="form-select" name="userRole" aria-label="Default select example" required>
                  <option value="" disabled selected>Select your category</option>
                  <option value="Administrator">Administrator</option>
                  <option value="student">Students</option>
                  <option value="staff">Staff</option>
                </select>
              </div>

                    <div class="pt-1 mb-4">
                      <button class="btn btn-dark btn-lg btn-block" type="submit">Login</button>
                    </div>

                    <a class="small text-muted" href="#!">Forgot password?</a>
                    <p class="mb-5 pb-lg-2" style="color: #393f81;">Don't have an account? <a href="mailto:nurfqhah@gmail.com?subject=Hello&body=I Dont Have Account" style="color: #393f81;">Contact Administrator</a></p>
                    <a href="#!" class="small text-muted">Terms of use.</a>
                    <a href="#!" class="small text-muted">Privacy policy</a>
                  </form>

                
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</body>
</html>
