<?php
    require_once(__DIR__ . '/../crud/database.php');

    function getExhibitsForMuseum(int $id) {
        $conn = getDatabaseConnection();
        if (!$conn) {
            echo "Error connecting to database<br>";
        } else {
            $sql = "
                SELECT * FROM Exhibit WHERE museum_id='" . $id . "';
            ";

            $result = mysqli_query($conn, $sql);
            if ($result) {
                $exhibits = [];
                while($exhibit = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
                    $exhibits[] = $exhibit;
                }
                return $exhibits;
            } else {
                echo "Failed query<br>" . mysqli_error($conn);
            }
        }
    }

?>
