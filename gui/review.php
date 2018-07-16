<?php
    function reviewForm(int $id) {
        return <<<HTML
            <form action="api/reviews.php" method="POST">
                <select name="rating">
                    <option value='1'>1</option>
                    <option value='2'>2</option>
                    <option value='3'>3</option>
                    <option value='4'>4</option>
                    <option value='5'>5</option>
                </select><br>
                <textarea name="comment" rows="8" cols="40" placeholder="Write a review..."></textarea><br>
                <input type="hidden" name="action" value="create">
                <input type="hidden" name="id" value="$id"/>
                <input type="submit">
            </form>
HTML;
    }
?>
