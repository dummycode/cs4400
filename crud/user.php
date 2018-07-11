<?php
    require_once(__DIR__ . '/database.php');
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
?>
