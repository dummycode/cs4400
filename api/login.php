<?php
    require_once(__DIR__  . '/../crud/database.php');

    if (isset($_POST['action'])) {
        switch ($_POST['action']) {
            case 'auth':
                authenticate($_POST['email'], $_POST['password']);
                break;
            default:
                break;
        }
    }

    function authenticate($email, $password) {
        // Create connection
        $conn = getDatabaseConnection();
        if (!$conn) {
            echo "Failed to connect to database";
        }

        $sql = "
            SELECT * FROM Visitor
            WHERE email='" . $_POST['email'] . "' AND password='" . $_POST['password'] . "';
        ";

        $result = mysqli_query($conn, $sql);
        if ($result) {
            if (mysqli_num_rows($result) == 1) {
                $userId = mysqli_fetch_array($result, MYSQLI_ASSOC)["id"];
                setcookie('token', $userId, time() + (60 * 60 * 24 * 365), "/");
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
