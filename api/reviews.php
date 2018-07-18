<?php
    require_once(__DIR__ . '/../crud/database.php');
    require_once(__DIR__ . '/../crud/user.php');
    require_once(__DIR__ . '/tickets.php');

    if (isset($_POST['action'])) {
        switch ($_POST['action']) {
            case 'create':
                createReview($_POST['id'], $_POST['rating'], $_POST['comment']);
                break;
            default:
                break;
        }
    }

    function getReviews(int $user_id, int $museum_id) {
        $conn = getDatabaseConnection();
        if (!$conn) {
            echo "Error connecting to database<br>";
        } else {
            $where = "1=1"
                . ($user_id ? " AND visitor_id='" . $user_id . "'" : "")
                . ($museum_id ? " AND museum_id='" . $museum_id . "'" : "");

            $sql = "SELECT *
                    FROM (Review LEFT JOIN Museum ON Review.museum_id = Museum.id)
                    WHERE " . $where;

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

    function createReview(int $id, $rating, $comment) {
        $conn = getDatabaseConnection();
        if (!$conn) {
            echo "Error connecting to database<br>";
        } else {
            // Check if they have a ticket for this museum
            if (!haveTicketForMuseum($id)) {
                echo "You have not bought a ticket for this museum";
            } else {
                $sql = "SELECT *
                        FROM Review
                        WHERE museum_id ='" . $id . "' AND visitor_id='" . myUserId() . "';";

                $result = mysqli_query($conn, $sql);

                if ($result) {
                    // Already have a ticket
                    if (mysqli_num_rows($result) > 0) {
                        echo "You already have written a review for this museum";
                    } else {
                        // Save the review
                        $sql = "
                            INSERT INTO Review(museum_id, visitor_id, comment, rating)
                            VALUES(" . $id . ", " . myUserId() . ", '" . $comment . "', " . $rating . ");";
                        $result = mysqli_query($conn, $sql);
                        if ($result) {
                            echo "Wrote a review";
                        } else {
                            echo "Failed query<br>" . mysqli_error($conn);
                        }
                    }
                } else {
                    echo "Failed query<br>" . mysqli_error($conn);
                }
            }
        }
    }
?>
