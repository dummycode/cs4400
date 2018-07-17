<html>
    <body>
        <?php
            require_once(__DIR__ . '/gui/museums.php');
            require_once(__DIR__ . '/crud/user.php');

            $curator = $_GET['curator'] ?? 0;

            if ($curator) {
                echo '<h2>My Museums</h2>';
                displayMuseumsCurating(myUserId());
            } else {
                echo '<h2>All Museums</h2>';
                displayAllMuseums();
            }
        ?>
        <form action="index.php">
            <input type="submit" value="Back"/>
        </form>
    </body>
</html>
