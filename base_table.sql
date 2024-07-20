-- Create the database
CREATE DATABASE IF NOT EXISTS "serve-together";

-- Use the newly created database
USE volunteer_db;

-- Create the opportunities table
CREATE TABLE IF NOT EXISTS opportunities (
    id INT AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(255) NOT NULL,
    description TEXT NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);
