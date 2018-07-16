<html>
    <body>
        <?php
            require_once(__DIR__ . '/gui/museums.php');
            require_once(__DIR__ . '/crud/user.php');

            $curator = $_GET['curator'] ?? 0;

            if ($curator) {
                echo '<h1>My Museums</h1>';
                displayMuseumsCurating(myUserId());
            } else {
                echo '<h1>All Museums</h1>';
                displayAllMuseums();
            }
        ?>
        <form action="index.php">
            <input type="submit" value="Back"/>
        </form>
    </body>
</html>
