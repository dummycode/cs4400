<?php
    require_once(__DIR__ . '/database.php');

    if (isset($_POST['action'])) {
        switch ($_POST['action']) {
            case 'logout':
                logout();
                break;
            default:
                break;
        }
    }

    function getUser(int $id) {
        $conn = getDatabaseConnection();
        if (!$conn) {
            echo "Failed to connect to database";
        } else {
            $sql = "SELECT * FROM Visitor WHERE id='" . $id . "';";
            $result = mysqli_query($conn, $sql);

            return mysqli_fetch_array($result, MYSQLI_ASSOC);
        }
    }

    function myUserId() {
        return $_COOKIE['token'] ?? null;
    }

    function amLoggedIn() {
        return isset($_COOKIE['token']);
    }

    /**
     * Middleware for actions that require authentication
     */
    function isAuthenticated() {
        return true;
    }
?>
