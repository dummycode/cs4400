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
    <body>
        <?php
            require_once(__DIR__ . '/gui/exhibits.php');
            require_once(__DIR__ . '/api/exhibits.php');
            require_once(__DIR__ . '/api/museums.php');

            $museum = fetchMuseum($_GET['museum_id']);

            echo '<h2>New exhibit for ' . $museum['name'] . '</h2>';

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
