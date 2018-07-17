<?php
    require_once(__DIR__  . '/../crud/database.php');
    require_once(__DIR__ . '/users.php');

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
            $adminResult = isAdmin($email, $password);

            $userFound = mysqli_num_rows($result) == 1;
            $adminFound = mysqli_num_rows($adminResult) == 1;

            $userId = '';
            $location = '';

            if ($userFound) {
                $userId = mysqli_fetch_array($result, MYSQLI_ASSOC)["id"];
                $location = '../index.php';
            } else if ($adminFound) {
                $userId = mysqli_fetch_array($adminResult, MYSQLI_ASSOC)["id"];
                $location = '../admin/index.php';
            } else {
                echo "Invalid credentials<br>";
                die();
            }

            setcookie('token', $userId, time() + (60 * 60 * 24 * 365), "/");

            header("Location: " . $location);
            die();
        } else {
            echo "Failed query<br>" . mysqli_error($conn);
        }
    }
?>
