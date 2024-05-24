<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Booking Page</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
<style>
* {
  box-sizing: border-box;
}

body {
  font-family: Arial, Helvetica, sans-serif;
}

/* Style the header */
header {
  background-color: #3EA99F;
  padding: 1px;
  text-align: center;
  font-size: 20px;
  color: white;

}
  ul {
  list-style-type: none;
  margin: 0;
  padding: 0;
  overflow: hidden;
  background-color: #333;
}

li {
  float: left;
}

li a {
  display: block;
  color: white;
  text-align: center;
  padding: 14px 16px;
  text-decoration: none;
}

li a:hover:not(.active) {
  background-color: #111;
}

.active {
  background-color: #04AA6D;
}

}

/* Create two columns/boxes that floats next to each other */
nav {
  float: left;
  width: 20%;
  height: 300px; /* only for demonstration, should be removed */
  background: #FFFFFF;
  padding: left;
}

/* Style the list inside the menu */
nav ul {
  list-style-type: none;
  padding: 0;
}

article {
  float: right;
  padding: 100px;
  width: 100%;
  background-color: #f1f1f1;
  height: 500px; /* only for demonstration, should be removed */
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
  nav, article {
    width: 100%;
    height: auto;
  }
}


ul {
  list-style-type: none;
  margin: 0;
  padding: 0;
  overflow: hidden;
  background-color: #333;
}

li {
  float: left;
}

li a {
  display: block;
  color: white;
  text-align: center;
  padding: 14px 16px;
  text-decoration: none;
}

li a:hover:not(.active) {
  background-color: #111;
}

.active {
  background-color: #04AA6D;
}



</style>
</head>
<body>

<img src="Assets/UMPLogo.jpeg" alt="UMPLogo" style="float:left;width:75px;height:86px;">

<header>
  <h2>FKPark</h2>

</header>

<section>
  <nav>
  <ul>
  <li><a class="active" href="#home">Home</a></li>
  <li><a href="#booking">Booking</a></li>
  <li><a href="#tsummon">Traffic Summon</a></li>
  <li><a href="#help">Help</a></li>
  <li style="float:right"><a class="active" href="login">Log In</a></li>
  </ul>
  </nav>
  
  <article>
  <form action="/action_page.php">
  <label for="name">Name:</label><br>
  <input type="text" id="name" name="name" value="ABC"><br>
  <label for="id">ID number:</label><br>
  <input type="text" id="id" name="id" value="CXXXXXX"><br><br>

  <p>Choose your parking area:</p>
  <form action="/action_page.php">
  <input type="radio" id="A1" name="parking_area" value="A1">
  <label for="A1">A1</label><br>
  <input type="radio" id="A2" name="parking_area" value="A2">
  <label for="A2">A2</label><br>
  <input type="radio" id="A3" name="parking_area" value="A3">
  <label for="A3">A3</label><br><br>
  <input type="radio" id="B1" name="parking_area" value="B1">
  <label for="A3">B1</label><br><br>
  <input type="radio" id="B2" name="parking_area" value="B2">
  <label for="A3">B2</label><br><br>
  <input type="radio" id="B3" name="parking_area" value="B3">
  <label for="A3">B3</label><br><br>

</form> 
  <input type="reset" value="Clear">
  <input type="submit" value="Submit">
  
</form> 
  </article>
</section>

<footer>
  <p>F
Copyright © 2024 Official Portal - UMPSA Universiti Malaysia Pahang Al-Sultan Abdullah (Malaysia University) - Public University in Pahang· All rights reserved</p>
</footer>

</body>
</html>

