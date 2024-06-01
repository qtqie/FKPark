CREATE TABLE registration (
    user_name VARCHAR(50) NOT NULL,
    user_pw VARCHAR(50) NOT NULL,
    vehicle_plate VARCHAR(10) NOT NULL,
    vehicle_type VARCHAR(20) ,
    user_id VARCHAR (20) PRIMARY KEY,
    user_email VARCHAR(20) NOT NULL,
    user_type VARCHAR(20),
    user_address VARCHAR(20) NOT NULL,
);
