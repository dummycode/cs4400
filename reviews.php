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
            require_once(__DIR__ . '/gui/reviews.php');
            require_once(__DIR__ . '/crud/user.php');

            $museum_id = $_GET['museum_id'] ?? 0;

            if ($museum_id) {
                displayAllReviews($museum_id);
                echo '
                    <form action="museum.php">
                        <input type="hidden" name="id" value="' . $museum_id . '">
                        <input type="submit" value="Back"/>
                    </form>
                ';
            } else {
                displayMyReviews(myUserId());
                echo '
                    <form action="index.php">
                        <input type="submit" value="Back"/>
                    </form>
                ';
            }
        ?>
    </body>
</html>
