<?php
$config = require('../config.php');
$database = $config['database'];
// Database configurations
$host = $database['host'];
$user = $database['user'];
$pass = $database['pass'];
$name = $database['name'];

// Create connection
$conn = mysqli_connect($host, $user, $pass, $name);
if (!$conn) {
    echo "Failed to connect to database";
}

if (count($_POST) != 3) {
    echo implode(", ", $_POST) . '<br>';
    echo count($_POST) . '<br>';
    echo "Incorrect arguments";
} else {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $sql = "
        SELECT * FROM Visitor
        WHERE email='" . $_POST['email'] . "' AND password='" . $_POST['password'] . "';
    ";

    $result = mysqli_query($conn, $sql);
    if ($result) {
        if (mysqli_num_rows($result) == 1) {
            echo "Good";
            setcookie('token', 'authenticated', time() + (60), "/");
            header("Location: ../index.php");
            die();
        } else {
            echo "Invalid credentials<br>";
        }
    } else {
        echo "Failed query<br>" . mysqli_error($conn);
    }
}
?>
