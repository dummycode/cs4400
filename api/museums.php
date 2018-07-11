<?php
    require(__DIR__ . '/../crud/database.php');

    function getMuseums() {
        $conn = getDatabaseConnection();
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

?>
