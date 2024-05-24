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
        background-color: #40E0D0;
      }
        body {
            font-family: Arial, sans-serif; /* Ensure the body uses the desired font */
        }

        .bubble {
            width: 200px; /* Set the width of the bubble */
            height: 200px; /* Set the height of the bubble */
            background-color: #808080; /* Set the background color */
            color: white; /* Set the text color */
            border-radius: 50%; /* Make it a circle */
            display: flex;
            justify-content: center;
            align-items: center;
            font-size: 20px;
        }

        .container {
            text-align: center;
        }

        .greeting {

            padding: 8px 8px 8px 16px;
            text-decoration: none;
            font-size: 18px; /* Adjusted font size */
            color: #818181;
            display: block;
        }

        .textbox {
            background-color: #808080;
            width: 250px;
            padding: 10px;
            font-size: 16px;
            border: 3px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
            justify-content: center;
            align-items: center;
            text: center;
        }

        .sidenav {
            height: 100%; /* Full-height: remove this if you want "auto" height */
            width: 200px; /* Adjusted width of the sidebar */
            position: fixed; /* Fixed Sidebar (stay in place on scroll) */
            z-index: 1; /* Stay on top */
            top: 0; /* Stay at the top */
            left: 0;
            background-color: #111; /* Black */
            overflow-x: hidden; /* Disable horizontal scroll */
            padding-top: 20px;
            font-family: Arial, sans-serif; /* Match the font with the rest of the site */
        }

        .sidenav a, .dropdown-toggle {
            padding: 8px 8px 8px 16px;
            text-decoration: none;
            font-size: 18px; /* Adjusted font size */
            color: #818181;
            display: block;
        }

        .sidenav a:hover, .dropdown-toggle:hover {
            color: #f1f1f1;
        }

        main {
            margin-left: 0px; /* Same as the width of the sidebar */
            padding: 0px;
        }

        .dropdown-menu a {
            color: #111; /* Default text color */
        }

        .dropdown-menu a:hover {
            color: #f1f1f1; /* Text color on hover */
        }

        /* Remove border between navbar and main page */
        .navbar {
            margin-bottom: 0;
            border: none;
        }

        .container.px-lg-5, .p-4, .p-lg-5 {
            margin: 0;
            padding: 0;
        }

        .logo {
            border-radius: 50%; /* Make it a circle */
            width: 50px; /* Set the width */
            height: 50px; /* Set the height */
        }

        .bg-image-full {
              background-color: #40E0D0; /* Set your desired color here */
              background-size: cover;
              height: 100vh;
             } 

    </style>
  </head>
  <body>
    
    <!-- Main content -->
    <main>
        <!-- Responsive navbar-->
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <div class="container px-lg-5">
                <a class="navbar-brand" href="#!">FKPark</a>
                <img src="data:image/png;base64,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" alt="Logo" class="logo">
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                        <li class="nav-item"><a class="nav-link active" aria-current="page" href="#!">Home</a></li>
                        <li class="nav-item"><a class="nav-link" href="#!">Booking</a></li>
                        <li class="nav-item"><a class="nav-link" href="#!">Traffic Summon</a></li>
                        <div class="dropdown">
                        <a class="dropdown-toggle" href="#" role="button" id="expertDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                         Profile
                        </a>
                     <ul class="dropdown-menu" aria-labelledby="expertDropdown">
                     <li><a class="dropdown-item" href="#addExpert">Manage Vehicle Information</a></li>
                     <li><a class="dropdown-item" href="#editExpert">Manage Profile</a></li>
                     <li><a class="dropdown-item" href="#viewExpert">Reports</a></li>
                    </ul>
                </div>
                <div class="dropdown">
                        <a class="dropdown-toggle" href="#" role="button" id="expertDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                         Parking Setting
                        </a>
                     <ul class="dropdown-menu" aria-labelledby="expertDropdown">
                     <li><a class="dropdown-item" href="#addExpert">Manage Booking</a></li>
                     <li><a class="dropdown-item" href="#editExpert">View Booking</a></li>
                     <li><a class="dropdown-item" href="#viewExpert">Reports</a></li>
                    </ul>
                </div>
            </div>
        </nav>
        
        <!-- Header-->
        <header class="py-5">
        <div class="col-xl-6">
                  <div class="card-body p-md-5 text-black">
                    <h3 class="mb-5 text-uppercase">Vehicle registration form</h3>

                    <div data-mdb-input-init class="form-outline mb-4">
                      <input type="text" id="form3Example8" class="form-control form-control-lg" />
                      <label class="form-label" for="form3Example8">Vehicle ID</label>
                    </div>

                    <div class="row">
                      <div class="col-md-6 mb-4">
                        <select data-mdb-select-init class="form-select">
                          <option value="1">Vehicle Type</option>
                          <option value="2">MPV</option>
                          <option value="3">Car</option>
                          <option value="4">Motorcycle</option>
                        </select>
                      </div>

                    <div class="row">
                      <div class="col-md-6 mb-4">
                        <div data-mdb-input-init class="form-outline">
                          <input type="text" id="form3Example1m1" class="form-control form-control-lg" />
                          <label class="form-label" for="form3Example1m1">Vehicle's number plate</label>
                        </div>
                      </div>

                    <div data-mdb-input-init class="form-outline mb-4">
                      <input type="text" id="form3Example97" class="form-control form-control-lg" />
                      <label class="form-label" for="form3Example97">Email </label>
                    </div>


                    <div class="mb-4">
                      <label class="form-label" for="formFile">Upload Grant</label>
                      <input type="file" id="formFile" class="form-control form-control-lg">
                    </div>


                    <div class="d-flex justify-content-end pt-3">
                      <button type="button" data-mdb-button-init data-mdb-ripple-init class="btn btn-light btn-lg">Reset all</button>
                      <button type="button" data-mdb-button-init data-mdb-ripple-init class="btn btn-warning btn-lg ms-2">Submit</button>
                    </div>

                  </div>
                </div>
              </div>
            </div>
            
        </section>
    <!-- Bootstrap core JS-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Core theme JS-->
    <script src="js/scripts.js"></script>
  </body>
</html>

