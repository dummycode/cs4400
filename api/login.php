<?php
require(__DIR__  . '/../crud/database.php');

// Create connection
$conn = getDatabaseConnection();
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
            $userId = mysqli_fetch_array($result, MYSQLI_ASSOC)["id"];
            setcookie('token', $userId, time() + (60), "/");
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
