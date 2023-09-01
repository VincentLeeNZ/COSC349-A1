<?php
$db_host = '192.168.56.12';
$db_name = 'fvision';
$db_user = 'webuser';
$db_passwd = 'hello';

session_start();

$pdo_dsn = "mysql:host=$db_host;dbname=$db_name";



try {
    $pdo = new PDO($pdo_dsn, $db_user, $db_passwd);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Connection failed: " . $e->getMessage());
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];

    $sql = "SELECT * FROM login WHERE username=:username AND password=:password";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':username', $username, PDO::PARAM_STR);
    $stmt->bindParam(':password', $password, PDO::PARAM_STR);
    
    if ($stmt->execute()) {
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        
        if ($row) {
            if ($row["usertype"] == "user") {
                $_SESSION["username"] = $username;
                header("location: home-page.php");
                exit();
            } elseif ($row["usertype"] == "admin") {
                $_SESSION["username"] = $username;
                header("location: dashboard.php");
                exit();
            }
        } else {
            echo "Username or password incorrect";
        }
    } else {
        echo "Error executing query";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
</head>
<body>
    <center>
        <h1>Login Form</h1>
        <br><br><br><br>
        <div style="background-color: grey; width: 500px;">
            <br><br>
            <form action="#" method="POST">
                <div>
                    <label>Username</label>
                    <input type="text" name="username" required>
                </div>
                <br><br>
                <div>
                    <label>Password</label>
                    <input type="password" name="password" required>
                </div>
                <br><br>
                <div>
                    <input type="submit" value="Login">
                </div>
            </form>
            <br><br>
        </div>
    </center>
</body>
</html>
