-- Create the login table
CREATE TABLE IF NOT EXISTS login (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(255) NOT NULL,
    password VARCHAR(255) NOT NULL,
    usertype ENUM('user', 'admin') NOT NULL
);

-- Insert the admin user
INSERT INTO login (username, password, usertype) VALUES ('admin', 'admin', 'admin');
