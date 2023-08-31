<!DOCTYPE HTML PUBLIC "-//IETF//DTD HTML//EN">
<html>
<head><title>Database test page</title>
<style>
th { text-align: left; }

table, th, td {
  border: 2px solid grey;
  border-collapse: collapse;
}

th, td {
  padding: 0.2em;
}
</style>
</head>

<body>
<h1>Database test page for Users</h1>

<p>Showing contents of products table:</p>

<table border="1">
<tr><th>Product code</th><th>Product name</th><th>Price</th><th>Description</th></tr>

<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

 
$db_host   = '192.168.56.12';
$db_name   = 'fvision';
$db_user   = 'webuser';
$db_passwd = 'hello';

$pdo_dsn = "mysql:host=$db_host;dbname=$db_name";

$pdo = new PDO($pdo_dsn, $db_user, $db_passwd);

$q = $pdo->query("SELECT * FROM products");

while($row = $q->fetch()){
  echo "<tr><td>".$row["code"]."</td><td>".$row["name"]."</td><td>".$row["price"]."</td><td>".$row["description"]."</td></tr>\n";
}

?>

