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

    if (count($_POST) != 6) {
        echo implode(", ", $_POST) . '<br>';
        echo count($_POST) . '<br>';
        echo "Incorrect arguments";
    } else {
        $email = $_POST['email'];
        $password = $_POST['password'];
        $card_number = $_POST['card_number'];
        $exp_month = $_POST['exp_month'];
        $exp_year = $_POST['exp_year'];
        $security_number = $_POST['security_number'];

        $sql = "
            INSERT INTO Visitor (id, email, password, card_number, exp_month, exp_year, security_number)
            VALUES (
                null,
                '" . $_POST['email'] . "',
                '" . $_POST['password'] . "',
                '" . $_POST['card_number'] . "',
                '" . $_POST['exp_month'] . "',
                '" . $_POST['exp_year'] . "',
                '" . $_POST['security_number'] . "'
            )
        ";

        if (mysqli_query($conn, $sql)) {
            echo "Good";
            setcookie('token', 'test', time() + (30), "/");
            header("Location: ../index.php");
            die();
        } else {
            echo "Failed query<br>" . mysqli_error($conn);
        }
    }
?>
