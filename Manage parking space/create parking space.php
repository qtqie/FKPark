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
   <h2>Create parking space</h2>
    

    <div>
      <label for="location">Location/Address:</label><br>
      <input type="text" id="location" name="location" value="Universiti Malaysia Pahang Al-Sultan Abdullah, Fakulti Komputeran, 26600, Pekan, Pahang, Malaysia">
    </div>

    <div class="total-spaces">
                <label for="spaces">Total Spaces:</label>
                <input type="number" id="spaces" value="9">
            </div>
        </div>
            <div class="parking">
                <label for="parking-table">Car Park Available<br>Click(/, yes)(x, no)</label>
            </div>
        </div>


                <div id="parking-table">
                    <!-- Table will be generated here -->
                </div>
            </div>
            
            <div class="buttons">
                <button id="clear">Clear</button>
                <button id="submit">Submit</button>
            </div>
        </main>
    </div>
  </article>
  
</section>

  <script>
  document.addEventListener('DOMContentLoaded', () => {
    const spacesInput = document.getElementById('spaces');
    const parkingTable = document.getElementById('parking-table');
    const clearButton = document.getElementById('clear');
    const submitButton = document.getElementById('submit');

    function createParkingSpaces(totalSpaces) {
        parkingTable.innerHTML = ''; // Clear existing spaces
        const rows = Math.ceil(totalSpaces / 3);
        let spaceCounter = 1;
        for (let i = 0; i < rows; i++) {
            for (let j = 0; j < 3; j++) {
                if (spaceCounter > totalSpaces) break;
                const space = document.createElement('div');
                space.className = 'space';
                space.innerHTML = `
                    ${String.fromCharCode(65 + j)}${i + 1}<br>
                    (<span class="status">/</span>)
                `;
                space.addEventListener('click', () => {
                    const statusSpan = space.querySelector('.status');
                    statusSpan.textContent = statusSpan.textContent === '/' ? 'X' : '/';
                });
                parkingTable.appendChild(space);
                spaceCounter++;
            }
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

    // Initial table creation
    createParkingSpaces(parseInt(spacesInput.value, 10));
});
    function clearForm() {
      document.getElementById("location").value = "";
      document.getElementById("spaces").value = "";
      // Clear checkboxes
      var checkboxes = document.querySelectorAll('input[type="checkbox"]');
      checkboxes.forEach(function(checkbox) {
        checkbox.checked = false;
      });
    }

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