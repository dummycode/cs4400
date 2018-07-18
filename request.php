<html>
    <body>
        <?php
            require_once(__DIR__ . '/gui/curator.php');

            echo requestForm();
        ?>
        <form action="manage.php">
            <input type="submit" value="Back"/>
        </form>
    </body>
</html>
