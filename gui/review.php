<?php
    function reviewForm(int $id) {
        require_once(__DIR__ . '/../api/reviews.php');
        require_once(__DIR__ . '/../crud/user.php');
        // TODO populate form with old data
        $museum = getReviews(myUserId(), $id)[0];
        $rating = $museum['rating'] ?? 1;
        $comment = $museum['comment'] ?? '';
        echo '
            <head>
                <script>
                    function populateForm() {
                        document.getElementById("'. $rating. '").selected = "selected";
                        document.getElementById("comment").value = "' . $comment . '";
                    }
                </script>
            </head>
        ';
        return <<<HTML
            <body onload="populateForm()">
                <form action="api/reviews.php" method="post" onload="populateForm()">
                    Rating (stars): <select name="rating">
                        <option id='1' value='1'>1</option>
                        <option id='2' value='2'>2</option>
                        <option id='3' value='3'>3</option>
                        <option id='4' value='4'>4</option>
                        <option id='5' value='5'>5</option>
                    </select><br>
                    <textarea id="comment" name="comment" rows="8" cols="40" placeholder="Write a review..." value=$comment></textarea><br>
                    <input type="hidden" name="action" value="create">
                    <input type="hidden" name="id" value="$id"/>
                    <input type="submit">
                </form>
HTML;
    }
?>
