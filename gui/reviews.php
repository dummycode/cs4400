<?php
    require_once(__DIR__ . '/../api/reviews.php');
    require_once(__DIR__ . '/../api/museums.php');
    require_once(__DIR__ . '/../crud/user.php');

    function displayMyReviews() {
        $reviews = getReviews(myUserId(), 0);

        echo "<h2>My Reviews</h2>";
        displayReviews($reviews);
    }

    function displayAllReviews(int $museum_id) {
        $reviews = getReviews(0, $museum_id);
        $museum = fetchMuseum($museum_id);

        echo "<h2>All Reviews for " . $museum['name'] . "</h2>";
        displayReviews($reviews);
    }

    function displayReviews($reviews) {
        echo "<table border='1'>";
        echo "
            <tr>
                <th>Museum Review</th>
                <th>Review</th>
                <th>Rating</th>
            </tr>
        ";
        foreach($reviews as $review) {
            echo "
                <tr>
                    <td><a href=\"./museum.php?id=" . $review['museum_id'] . "\">" . $review['name'] . "</a></td>
                    <td>" . $review['comment'] . "</td>
                    <td>" . $review['rating'] . "/5</td>
                </tr>
            ";
        }
        echo "</table>";
    }
?>
