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
<h1>Database test page</h1>

<p>Showing contents of papers table:</p>

<table border="1">
<tr><th>Paper code</th><th>Paper name</th></tr>

<?php
 
$db_host   = '192.168.56.12';
$db_name   = 'fvision';
$db_user   = 'webuser';
$db_passwd = 'hello';

$pdo_dsn = "mysql:host=$db_host;dbname=$db_name";

$pdo = new PDO($pdo_dsn, $db_user, $db_passwd);

$q = $pdo->query("SELECT * FROM papers");

while($row = $q->fetch()){
  echo "<tr><td>".$row["code"]."</td><td>".$row["name"]."</td></tr>\n";
}

?>

<h2>Add a New Paper:</h2>
<form method="post">
  <label for="code">Paper Code:</label>
  <input type="text" id="code" name="code" required><br>
  
  <label for="name">Paper Name:</label>
  <input type="text" id="name" name="name" required><br>
  <input type="submit" value="Add Paper">
</form>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $code = $_POST["code"];
    $name = $_POST["name"];
    
    // Prepare and execute the INSERT query
    $insert_query = "INSERT INTO papers (code, name) VALUES (:code, :name)";
    $insert_statement = $pdo->prepare($insert_query);
    $insert_statement->bindParam(":code", $code);
    $insert_statement->bindParam(":name", $name);
    
    if ($insert_statement->execute()) {
        echo "<p>New paper added successfully!</p>";
    } else {
        echo "<p>Failed to add paper.</p>";
    }
}
?>

</table>
</body>
</html>
