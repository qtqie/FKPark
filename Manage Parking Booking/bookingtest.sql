CREATE TABLE bookings (
  id INT AUTO_INCREMENT PRIMARY KEY,
  name VARCHAR(100) NOT NULL,
  id_number VARCHAR(50) NOT NULL,
  parking_area VARCHAR(10) NOT NULL,
  booking_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);
