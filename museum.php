<html>
    <body onload="bodyLoaded()">
        <?php
            session_start();
            if (isset($_SESSION['message'])) {
                $message = $_SESSION['message'];
                echo "
                    <script type='text/javascript'>
                        function bodyLoaded() {
                            alert('$message');
                        }
                    </script>";
                unset($_SESSION['message']);
            }
            require_once(__DIR__ . '/gui/museums.php');
            require_once(__DIR__ . '/api/tickets.php');
            require_once(__DIR__ . '/crud/user.php');
            require_once(__DIR__ . '/api/museums.php');

            $museum_id = $_GET['id'];

            $museums = getMuseumsCurating(myUserId());
            $isCurator = array_filter($museums, "isCurator");

            displayMuseum($museum_id, $isCurator);

            echo '
                <form method="post" action="api/tickets.php">
                    <input type="hidden" name="action" value="purchase">
                    <input type="hidden" name="id" value="' . $museum_id . '"/>
                    <input type="submit" value="Purchase Ticket"/>
                </form>
            ';
            echo '
                <form action="review.php" method="get">
                    <input type="hidden" name="id" value="' . $museum_id . '">
                    <input type="submit" value="Review Museum"/>
                </form>
                <form action="reviews.php">
                    <input type="hidden" name="museum_id" value="' . $museum_id . '">
                    <input type="submit" value="View Other Reviews"/>
                </form>
            ';

            if ($isCurator) {
                echo '
                    <form action="exhibit.php">
                        <input type="hidden" name="museum_id" value="' . $museum_id . '"/>
                        <input type="submit" value="Add Exhibit"/>
                    </form>
                ';
            }

            echo '
                <form action="index.php">
                    <input type="submit" value="Back"/>
                </form>
            ';

            function isCurator($museum) {
                return($museum['id'] === $_GET['id']);
            }
        ?>
    </body>
</html>
