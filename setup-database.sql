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
