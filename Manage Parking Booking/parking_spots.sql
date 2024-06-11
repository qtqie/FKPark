CREATE TABLE parking_spots (
    parking_id INT AUTO_INCREMENT PRIMARY KEY,
    area CHAR(1) CHECK (area IN ('A', 'B')),
    spot_number INT CHECK (spot_number BETWEEN 1 AND 10),
    status VARCHAR(20) CHECK (status IN ('Available', 'Occupied')),
    action VARCHAR(50) DEFAULT 'Book' -- Default value set to 'Book'
);
