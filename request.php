<?php
    session_start();
    $message = '';
    if (isset($_SESSION['message'])) {
        $message = $_SESSION['message'];
        unset($_SESSION['message']);
    }
?>
<html>
    <head>
        <?php
            require_once(__DIR__ . '/gui/style.php');
            echo "
                <script type='text/javascript'>
                    function bodyLoaded() {
                        if ('$message') {
                            alert('$message');
                        }
                    }
                </script>";
            ?>
    </head>
    <body onload="bodyLoaded()">
        <?php
            require_once(__DIR__ . '/gui/curator.php');

            echo requestForm();
        ?>
        <form action="manage.php">
            <input type="submit" value="Back"/>
        </form>
    </body>
</html>
