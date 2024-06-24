

-- Create the database
CREATE DATABASE user_db;

-- Use the database
USE user_db;

-- Create the photographer_form table
CREATE TABLE photographer_form (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    image VARCHAR(500) NOT NULL,
    contact VARCHAR(255) NOT NULL,
    image_work VARCHAR(500) NOT NULL,
    gender VARCHAR(255) NOT NULL,
    birth DATE NOT NULL,
    achive VARCHAR(900) NOT NULL,
    course VARCHAR(900) NOT NULL,
    bio VARCHAR(900) NOT NULL,
    bank_name VARCHAR(255) NOT NULL,
    bank_acc VARCHAR(255) NOT NULL,
    bank_u_name VARCHAR(255) NOT NULL,
    bank_branch VARCHAR(255) NOT NULL,\
);

-- Create the customer_form table with a foreign key referencing photographer_form(id)
CREATE TABLE user_form (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    contact VARCHAR(255) NOT NULL,
    photographer_id INT,
    FOREIGN KEY (photographer_id) REFERENCES photographer_form(id)
);
