#!/bin/bash

# Update package repositories and install Apache2
apt-get update
apt-get install -y apache2

# Set up a basic index.html file for the website
echo "<html><body><h1>Hello, Docker!</h1></body></html>" > /var/www/html/index.html

# Start the Apache service
service apache2 start
