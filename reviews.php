<html>
    <body>
        <h1>My Reviews</h1>
        <?php
            require_once(__DIR__ . '/gui/reviews.php');
            displayMyReviews($_COOKIE['token']);
        ?>
        <form action="index.php">
            <input type="submit" value="Back"/>
        </form>
    </body>
</html>