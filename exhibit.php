<html>
    <body>
        <?php
            require_once(__DIR__ . '/gui/exhibits.php');
            require_once(__DIR__ . '/api/exhibits.php');
            require_once(__DIR__ . '/api/museums.php');

            $museum = fetchMuseum($_GET['museum_id']);

            echo '<h1>New exhibit for ' . $museum['name'] . '</h1>';

            echo newExhibitForm($museum['id']);

            echo '
                <form action="museum.php">
                    <input type="hidden" name="id" value="' . $museum['id'] . '">
                    <input type="submit" value="Back"/>
                </form>
            ';
        ?>
    </body>
</html>
