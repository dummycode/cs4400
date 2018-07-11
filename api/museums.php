<?php
    require_once(__DIR__ . '/../crud/database.php');

    function getMuseums() {
        $conn = getDatabaseConnection();
        echo "test";
        if (!$conn) {
            echo "Error connecting to database<br>";
        } else {
            $sql = "SELECT * FROM Museum";

            $result = mysqli_query($conn, $sql);
            if ($result) {
                $museums = [];
                while($museum = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
                    $museums[] = $museum;
                }
                return $museums;
            } else {
                echo "Failed query<br>" . mysqli_error($conn);
            }
        }
    }
?>
