<html>
    <body>
        <h1>All Museums</h1>
        <?php
            require_once(__DIR__ . '/gui/museums.php');
            displayAllMuseums();
        ?>
        <form action="index.php">
            <input type="submit" value="Back"/>
        </form>
    </body>
</html>