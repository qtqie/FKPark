CREATE TABLE registration (
    user_id INT(20) AUTO_INCREMENT PRIMARY KEY,
    user_name VARCHAR(50) NOT NULL,
    user_pw VARCHAR(50) NOT NULL,
    vehicle_plate INT(10) NOT NULL,
    vehicle_type VARCHAR(20) NOT NULL,
    user_email VARCHAR(20) NOT NULL,
    user_type VARCHAR(20) NOT NULL,
    user_adress VARCHAR(20) NOT NULL,
    user_grant LONGBLOB NOT NULL
);
