<?php
    require_once(__DIR__ . '/../crud/database.php');
    require_once(__DIR__ . '/../crud/user.php');

    if (isset($_POST['action'])) {
        switch ($_POST['action']) {
            case 'logout':
                logout();
                break;
            case 'delete':
                deleteUser();
                break;
            default:
                break;
        }
    }

    function deleteUser() {
        // Create connection
        $conn = getDatabaseConnection();
        if (!$conn) {
            echo "Failed to connect to database";
        }

        $sql = "DELETE FROM Visitor WHERE id='" . myUserId() . "';";

        if (mysqli_query($conn, $sql)) {
            logout();
        } else {
            echo "Failed query<br>" . mysqli_error($conn);
        }
    }

    function logout() {
        setcookie('token', '', time() - 3600, "/");
        header("Location: ../index.php");
        die();
    }
?>
