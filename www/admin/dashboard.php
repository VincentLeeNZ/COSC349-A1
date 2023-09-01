<?php
session_start();

if (!isset($_SESSION["username"])) {
    header("location:login.php");
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Admin Home Page</title>
    <style>
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

        nav {
            background-color: #35424a;
            color: white;
            text-align: center;
            padding: 10px;
        }

        nav a {
            color: white;
            text-decoration: none;
            margin: 0 10px;
        }

        .container {
            max-width: 800px;
            margin: 20px auto;
            padding: 20px;
            background-color: white;
            box-shadow: 0 0 5px rgba(0, 0, 0, 0.2);
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #35424a;
            color: white;
        }

        form {
            margin-top: 20px;
        }

        label {
            display: inline-block;
            width: 120px;
            font-weight: bold;
        }

        input[type="text"] {
            width: 100%;
            padding: 8px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        input[type="submit"] {
            background-color: #35424a;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #29373d;
        }
    </style>
</head>
<body>

<header>
    <h1>Admin Home Page</h1>
    <p>Welcome, <?php echo $_SESSION["username"]; ?></p>
</header>

<nav>
    <a href="logout.php">Logout</a>
</nav>

<div class="container">
    <h2>Showing contents of products table:</h2>

    <table>
        <tr>
            <th>Product code</th>
            <th>Product name</th>
            <th>Price</th>
            <th>Description</th>
        </tr>

        <?php
        // Your existing PHP code for fetching and displaying table data goes here
        error_reporting(E_ALL);
        ini_set('display_errors', 1);

        $db_host   = '192.168.56.12';
        $db_name   = 'fvision';
        $db_user   = 'webuser';
        $db_passwd = 'hello';

        $pdo_dsn = "mysql:host=$db_host;dbname=$db_name";

        $pdo = new PDO($pdo_dsn, $db_user, $db_passwd);

        $q = $pdo->query("SELECT * FROM products");

        while ($row = $q->fetch()) {
            echo "<tr><td>" . $row["code"] . "</td><td>" . $row["name"] . "</td><td>" . $row["price"] . "</td><td>" . $row["description"] . "</td></tr>\n";
        }
        ?>

    </table>

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

</div>
</body>
</html>
