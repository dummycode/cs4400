<?php
    require_once(__DIR__ . '/../crud/database.php');

    function getMyReviews(int $id) {
        $conn = getDatabaseConnection();
        if (!$conn) {
            echo "Error connecting to database<br>";
        } else {
            $sql = "SELECT *
                    FROM Review
                    WHERE visitor_id ='" . $id . "';";

            $result = mysqli_query($conn, $sql);
            if ($result) {
                $reviews = [];
                while($review = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
                    $reviews[] = $review;
                }
                return $reviews;
            } else {
                echo "Failed query<br>" . mysqli_error($conn);
            }
        }
    }
?>