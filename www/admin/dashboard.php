<?php
session_start();


if(!isset($_SESSION["username"]))
{
	header("location:login.php");
}

?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>

<h1>THIS IS ADMIN HOME PAGE</h1><?php echo $_SESSION["username"] ?>

<a href="logout.php">Logout</a>
</body>
</html>

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
<h1>Database test page for admin</h1>

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

<h2>Add a New Product:</h2>
<form method="post">
  <label for="code">Product Code:</label>
  <input type="text" id="code" name="code" required><br>
  
  <label for="name">Product Name:</label>
  <input type="text" id="name" name="name" required><br>
  
  <label for="price">Price:</label>
  <input type="text" id="price" name="price" required><br>
  
  <label for="description">Description:</label>
  <input type="text" id="description" name="description" required><br>
  
  <input type="submit" value="Add Product">
</form>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $code = $_POST["code"];
    $name = $_POST["name"];
    $price = $_POST["price"];
    $description = $_POST["description"];
    
    // Prepare and execute the INSERT query
    $insert_query = "INSERT INTO products (code, name, price, description) VALUES (:code, :name, :price, :description)";
    $insert_statement = $pdo->prepare($insert_query);
    $insert_statement->bindParam(":code", $code);
    $insert_statement->bindParam(":name", $name);
    $insert_statement->bindParam(":price", $price);
    $insert_statement->bindParam(":description", $description);
    
    if ($insert_statement->execute()) {
        echo "<p>New product added successfully!</p>";
    } 
}
?>

</table>
</body>
</html>




