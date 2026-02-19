-- Database Schema for Assessment Task 2
-- This file defines the structure of the database

CREATE DATABASE IF NOT EXISTS web_project_db;
USE web_project_db;

-- Table to store Contact Form submissions
CREATE TABLE contact_messages (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_email VARCHAR(255) NOT NULL,
    subject_line VARCHAR(100),
    message_text TEXT NOT NULL,
    submission_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Dummy Data for Testing (Outcome SE-12-08)
INSERT INTO contact_messages (user_email, subject_line, message_text)
VALUES ('test@student.nsw.edu.au', 'Hello World', 'This is a test message.');
