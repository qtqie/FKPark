<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Create parking space Page</title>
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

form input[type="text"], form input[type="radio"] {
  margin-bottom: 10px;
}

form input[type="text"] {
  width: calc(100% - 22px);
  padding: 10px;
  margin-bottom: 20px;
  border: 1px solid #ccc;
  border-radius: 5px;
}

form input[type="radio"] {
  margin-right: 10px;
}

form input[type="submit"], form input[type="reset"] {
  background-color: #3EA99F;
  color: white;
  border: none;
  padding: 10px 20px;
  margin-right: 10px;
  border-radius: 5px;
  cursor: pointer;
}

form input[type="submit"]:hover, form input[type="reset"]:hover {
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

/* Responsive layout - makes the two columns/boxes stack on top of each other instead of next to each other, on small screens */
@media (max-width: 600px) {
  article {
    width: 100%;
    height: auto;
  }
}

li {
  border-right: 1px solid #bbb;
}

li:last-child {
  border-right: none;
}

li a {
  display: block;
  color: white;
  text-align: center;
  padding: 14px 16px;
  text-decoration: none;
}

li a:hover:not(.active) {
  background-color: #808080;
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

    <li><a href="#tsummon">Traffic Summon</a></li>

    <li><a href="#help">Help</a></li>

    <li class="dropdown">
      <a href="Parkingsetting" class="dropbtn">Parking Setting</a>
      <div class="dropdown-content">
      <a href="createparkingspace.php">Create Park</a>
        <a href="updateparking.php">Update Park</a>
        <a href="deleteparking.php">Delete Park</a>
        <a href="submitupdateparking.php">View Park</a>
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
 
 
  <form id="parkingForm" action="submitupdateparking.php" method="post">
      <h2>Update parking</h2>
      <div class="container">
        <label for="Parking">Parking:</label>
        <input type="text" id="Parking" name="Parking" value="A1">
        
        <table id="parkingTable">
          <thead>
            <tr>
             
              <th>Session</th>
              <th>carplatenumber</th>
              <th>Parkingstarttime</th>
              <th>Parkingendtime</th>
              <th>duration</th>
              <th>Availability</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
            <tr>
             
              <td><input type="text" name="session[]" value="A1A"></td>
              <td><input type="text" name="carplatenumber[]" value="ABC123"></td>
              <td><input type="text" name="parkingstarttime[]" value="9.00am"></td>
              <td><input type="text" name="parkingendtime[]" value="10.00am"></td>
              <td><input type="text" name="duration[]" value="1 hours"></td>
              <td><input type="text" name="availability[]" value="/"></td>
              <td><a href="#" onclick="editRow(this)">edit</a></td>
            </tr>
            <tr>
            
              <td><input type="text" name="session[]" value="A1B"></td>
              <td><input type="text" name="carplatenumber[]" value="DFE456"></td>
              <td><input type="text" name="parkingstarttime[]" value="10.00am"></td>
              <td><input type="text" name="parkingendtime[]" value="11.00am"></td>
              <td><input type="text" name="duration[]" value="1 hours"></td>
              <td><input type="text" name="availability[]" value="/"></td>
              <td><a href="#" onclick="editRow(this)">edit</a></td>
            </tr>
            <tr>
              
              <td><input type="text" name="session[]" value="A1C"></td>
              <td><input type="text" name="carplatenumber[]" value=""></td>
              <td><input type="text" name="parkingstarttime[]" value=""></td>
              <td><input type="text" name="parkingendtime[]" value=""></td>
              <td><input type="text" name="duration[]" value=""></td>
              <td><input type="text" name="availability[]" value="X"></td>
              <td><a href="#" onclick="editRow(this)">edit</a></td>
            </tr>
            <tr>
              
              <td><input type="text" name="session[]" value="A1D"></td>
              <td><input type="text" name="carplatenumber[]" value="SER543"></td>
              <td><input type="text" name="parkingstarttime[]" value="12.00am"></td>
              <td><input type="text" name="parkingendtime[]" value="1.00pm"></td>
              <td><input type="text" name="duration[]" value="1 hours"></td>
              <td><input type="text" name="availability[]" value="/"></td>
              <td><a href="#" onclick="editRow(this)">edit</a></td>
            </tr>
            <tr>
             
              <td><input type="text" name="session[]" value="A1E"></td>
              <td><input type="text" name="carplatenumber[]" value="DSG765"></td>
              <td><input type="text" name="parkingstarttime[]" value="11.00am"></td>
              <td><input type="text" name="parkingendtime[]" value="12.00am"></td>
              <td><input type="text" name="duration[]" value="1 hours"></td>
              <td><input type="text" name="availability[]" value="/"></td>
              <td><a href="#" onclick="editRow(this)">edit</a></td>
            </tr>
          </tbody>
        </table>
        <div class="buttons">
          <button type="button" onclick="clearForm()">Clear</button>
          <button type="submit">Submit</button>
        </div>
      </div>
    </form>

  </article>
  
</section>

  <script>
 
        function editRow(link) {
            var row = link.parentNode.parentNode;
            var cells = row.getElementsByTagName('td');
            for (var i = 0; i < cells.length - 1; i++) {
                var cellValue = cells[i].innerText;
                cells[i].innerHTML = '<input type="text" value="' + cellValue + '">';
            }
            link.innerText = 'save';
            link.setAttribute('onclick', 'saveRow(this)');
        }

        function saveRow(link) {
            var row = link.parentNode.parentNode;
            var cells = row.getElementsByTagName('td');
            for (var i = 0; i < cells.length - 1; i++) {
                var input = cells[i].getElementsByTagName('input')[0];
                cells[i].innerText = input.value;
            }
            link.innerText = 'edit';
            link.setAttribute('onclick', 'editRow(this)');
        }

        function clearForm() {
            var rows = document.getElementById('parkingTable').getElementsByTagName('tbody')[0].getElementsByTagName('tr');
            for (var i = 0; i < rows.length; i++) {
                var cells = rows[i].getElementsByTagName('td');
                for (var j = 0; j < cells.length - 1; j++) {
                    cells[j].innerText = '';
                }
                cells[cells.length - 2].innerText = '/';
            }
        }

        spacesInput.addEventListener('change', () => {
        const totalSpaces = parseInt(spacesInput.value, 10);
        createParkingSpaces(totalSpaces);
    });

    clearButton.addEventListener('click', () => {
        createParkingSpaces(parseInt(spacesInput.value, 10));
    });

    submitButton.addEventListener('click', () => {
        alert('Submitted');
    });

   
    function submitForm() {
      // You can add your form submission logic here
      alert("Form submitted!");
    }
    
  </script>
<footer>
  <p>Copyright © 2024 Official Portal - UMPSA Universiti Malaysia Pahang Al-Sultan Abdullah (Malaysia University) - Public University in Pahang· All rights reserved</p>
</footer>

</body>
</html>