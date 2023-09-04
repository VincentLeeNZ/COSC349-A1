# COSC349-A1
## Vincent Lee 5687923
This application uses Vagrant to set up three virtual machines, each with its distinct purpose. Among these, there are two web server machines and one dedicated database machine. The first web server, known as webserver, functions as the public-facing website that customers interact with when visiting the online store. Meanwhile, the second web server, known as the adminserver, serves as a platform for administrators to manage products and perform actions like adding or removing products. The database VM is responsible for housing the MySQL database, which stores essential product data, user information, and admin accounts for the online store. The web servers interact with the database to retrieve and update information, ensuring that the website functions smoothly and securely.

To run this application you will need to have Vagrant and VirtualBox installed. You can install them here:  
Vagrant: https://www.vagrantup.com/downloads  
VirtualBox: https://www.virtualbox.org/wiki/Downloads  

Once you have Vagrant and VirtualBox installed, clone this repository, navigate to the directory where you have saved it and run "vagrant up". This command will launch the Vagrant Boxes and install all necessary software components needed to run this application.  
Each of the Vagrant Boxes is approximately 2.5 GB after a full installation. 

The initial build time should take ~10 minutes.
Once all of the virtual machines have been built, you can head to http://127.0.0.1:8080/home-page.php to operate as a customer or http://127.0.0.1:8081/login.php to operate as an administrator. For testing purposes, the administrator username and password are both "admin".


