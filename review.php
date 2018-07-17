<html>
    <body>
        <?php
            require_once(__DIR__ . '/gui/review.php');
            require_once(__DIR__ . '/api/museums.php');

            $museum = fetchMuseum($_GET['id']);

            echo '<h2>Writing review for ' . $museum['name'] . '</h2>';
            echo reviewForm($museum['id']);

            echo '
                <form action="museum.php">
                    <input type="hidden" name="id" value="' . $museum['id'] . '">
                    <input type="submit" value="Back"/>
                </form>
            ';
        ?>
    </body>
</html>
