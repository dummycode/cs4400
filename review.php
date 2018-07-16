<html>
    <body>
        <?php
            require_once(__DIR__ . '/gui/review.php');
            require_once(__DIR__ . '/api/museums.php');

            $museum = fetchMuseum($_GET['id']);

            echo '<h1>Writing review for ' . $museum['name'] . '</h1>';
            echo reviewForm($museum['id']);

            echo '
                <form action="index.php">
                    <input type="submit" value="Back"/>
                </form>
            ';
        ?>
    </body>
</html>
