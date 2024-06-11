<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Administrator Dashboard</title>
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
main {
  margin: 20px auto;
  padding: 20px;
  width: 80%;
  background-color: #f1f1f1;
  border-radius: 10px;
  box-shadow: 0px 0px 15px rgba(0,0,0,0.2);
}

/* Dashboard sections */
.dashboard-section {
  margin-bottom: 20px;
}

.dashboard-section h3 {
  margin: 0 0 10px;
}

.chart-container {
  width: 100%;
  height: 400px;
}

/* Style the footer */
footer {
  background-color: #777;
  padding: 10px;
  text-align: center;
  color: white;
}
</style>
<!-- Include Chart.js for graphs -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body>

<header>
  <div style="display: flex; align-items: center;">
    <img src="Assets/UMPLogo.jpeg" alt="UMPLogo" style="width:75px;height:86px;">
    <h2>FKPark Admin Dashboard</h2>
  </div>
  <ul>
    <li><a class="active" href="#home">Home</a></li>
    <li><a href="#reports">Reports</a></li>
    <li><a href="#settings">Settings</a></li>
    <li style="float:right" class="dropdown">
      <a href="profile" class="dropbtn">Profile</a>
      <div class="dropdown-content">
        <a href="#">Sign Up</a>
        <a href="#">Log In</a>
      </div>
    </li>
  </ul>
</header>

<main>
  <h2>Administrator Dashboard</h2>
  
  <!-- Parking Statistics Section -->
  <div class="dashboard-section">
    <h3>Parking Statistics</h3>
    <div class="chart-container">
      <canvas id="parkingStatisticsChart"></canvas>
    </div>
  </div>
  
  <!-- Booking Trends Section -->
  <div class="dashboard-section">
    <h3>Booking Trends</h3>
    <div class="chart-container">
      <canvas id="bookingTrendsChart"></canvas>
    </div>
  </div>
  
  <!-- User Activity Section -->
  <div class="dashboard-section">
    <h3>User Activity</h3>
    <div class="chart-container">
      <canvas id="userActivityChart"></canvas>
    </div>
  </div>
  
  <!-- Traffic Summon Reports Section -->
  <div class="dashboard-section">
    <h3>Traffic Summon Reports</h3>
    <div class="chart-container">
      <canvas id="trafficSummonReportsChart"></canvas>
    </div>
  </div>
</main>

<footer>
  <p>Copyright © 2024 Official Portal - UMPSA Universiti Malaysia Pahang Al-Sultan Abdullah (Malaysia University) - Public University in Pahang· All rights reserved</p>
</footer>

<!-- JavaScript for Charts -->
<script>
// Example chart data and configuration
const ctxParking = document.getElementById('parkingStatisticsChart').getContext('2d');
const parkingStatisticsChart = new Chart(ctxParking, {
    type: 'bar',
    data: {
        labels: ['A1', 'A2', 'B1', 'B2', 'C1', 'C2'],
        datasets: [{
            label: '# of Parked Cars',
            data: [12, 19, 3, 5, 2, 3],
            backgroundColor: [
                'rgba(75, 192, 192, 0.2)'
            ],
            borderColor: [
                'rgba(75, 192, 192, 1)'
            ],
            borderWidth: 1
        }]
    },
    options: {
        scales: {
            y: {
                beginAtZero: true
            }
        }
    }
});

const ctxBooking = document.getElementById('bookingTrendsChart').getContext('2d');
const bookingTrendsChart = new Chart(ctxBooking, {
    type: 'line',
    data: {
        labels: ['January', 'February', 'March', 'April', 'May', 'June'],
        datasets: [{
            label: 'Bookings',
            data: [65, 59, 80, 81, 56, 55],
            backgroundColor: [
                'rgba(153, 102, 255, 0.2)'
            ],
            borderColor: [
                'rgba(153, 102, 255, 1)'
            ],
            borderWidth: 1
        }]
    },
    options: {
        scales: {
            y: {
                beginAtZero: true
            }
        }
    }
});

const ctxUserActivity = document.getElementById('userActivityChart').getContext('2d');
const userActivityChart = new Chart(ctxUserActivity, {
    type: 'pie',
    data: {
        labels: ['Active', 'Inactive'],
        datasets: [{
            label: '# of Users',
            data: [300, 50],
            backgroundColor: [
                'rgba(255, 206, 86, 0.2)',
                'rgba(255, 99, 132, 0.2)'
            ],
            borderColor: [
                'rgba(255, 206, 86, 1)',
                'rgba(255, 99, 132, 1)'
            ],
            borderWidth: 1
        }]
    },
    options: {
        responsive: true,
        plugins: {
            legend: {
                position: 'top',
            },
            title: {
                display: true,
                text: 'User Activity'
            }
        }
    }
});

const ctxTrafficSummon = document.getElementById('trafficSummonReportsChart').getContext('2d');
const trafficSummonReportsChart = new Chart(ctxTrafficSummon, {
    type: 'doughnut',
    data: {
        labels: ['Paid', 'Unpaid'],
        datasets: [{
            label: '# of Summons',
            data: [60, 40],
            backgroundColor: [
                'rgba(54, 162, 235, 0.2)',
                'rgba(255, 159, 64, 0.2)'
            ],
            borderColor: [
                'rgba(54, 162, 235, 1)',
                'rgba(255, 159, 64, 1)'
            ],
            borderWidth: 1
        }]
    },
    options: {
        responsive: true,
        plugins: {
            legend: {
                position: 'top',
            },
            title: {
                display: true,
                text: 'Traffic Summon Reports'
            }
        }
    }
});
</script>
</body>
</html>
