<?php
    function displayMyReviews(int $id) {
        require_once(__DIR__ . '/../api/reviews.php');
        $reviews = getMyReviews($id);
        echo "<table border = '1'>";
        echo "<tr><th>Museum Review</th><th>Review</th><th>Rating</th></tr>";
        foreach($reviews as $review) {
            echo "<tr><td>" . $review['museum_id'] . "</td><td>" . $review['comment'] . "</td><td>" . $review['rating'] . "/5</td></tr>";
        }
        echo "</table>";
    }
?>