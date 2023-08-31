CREATE TABLE products (
  code varchar(10),
  name varchar(100) NOT NULL,
  price decimal(10, 2) NOT NULL,
  description text,
  PRIMARY KEY (code)
);

INSERT INTO products VALUES ('PD001','Product A', 19.99, 'High-quality product A for your needs.');
INSERT INTO products VALUES ('PD002','Product B', 29.99, 'Advanced product B with unique features.');
INSERT INTO products VALUES ('PD003','Product C', 9.99, 'Basic yet effective product C for everyday use.');
INSERT INTO products VALUES ('PD004','Product D', 49.99, 'Premium product D with exceptional performance.');


-- Create the login table
CREATE TABLE IF NOT EXISTS login (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(255) NOT NULL,
    password VARCHAR(255) NOT NULL,
    usertype ENUM('user', 'admin') NOT NULL
);

-- Insert the admin user
INSERT INTO login (username, password, usertype) VALUES ('admin', 'admin', 'admin');
INSERT INTO login (username, password, usertype) VALUES ('user', 'user', 'user');
