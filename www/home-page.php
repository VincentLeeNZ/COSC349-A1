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
?>

<!DOCTYPE html>
<html>
<head>
    <title>Database test page for Users</title>
    <style>
        th {
            text-align: left;
        }

        table, th, td {
            border: 2px solid grey;
            border-collapse: collapse;
        }

        th, td {
            padding: 0.2em;
        }

        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }

        header {
            background-color: #35424a;
            color: white;
            padding: 20px;
            text-align: center;
        }

        .container {
            max-width: 800px;
            margin: 20px auto;
            padding: 20px;
            background-color: white;
            box-shadow: 0 0 5px rgba(0, 0, 0, 0.2);
        }

        .product {
            border: 1px solid #ccc;
            padding: 10px;
            margin-bottom: 10px;
            background-color: #fff;
        }
    </style>
</head>

<body>
<header>
    <h1>Database test page for Users</h1>
</header>

<div class="container">
    <?php
    while ($row = $q->fetch()) {
        echo '<div class="product">';
        echo '<h3>' . $row["name"] . '</h3>';
        echo '<p><strong>Product code:</strong> ' . $row["code"] . '</p>';
        echo '<p><strong>Price:</strong> ' . $row["price"] . '</p>';
        echo '<p><strong>Description:</strong> ' . $row["description"] . '</p>';
        echo '</div>';
    }
    ?>
</div>
</body>
</html>
