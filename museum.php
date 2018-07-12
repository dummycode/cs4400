<html>
    <body>
        <?php
            require_once(__DIR__ . '/gui/museums.php');
            require_once(__DIR__ . '/api/tickets.php');

            displayMuseum($_GET['id']);

            echo '
                <form method="post" action="api/tickets.php">
                    <input type="hidden" name="action" value="purchase">
                    <input type="hidden" name="id" value="' . $_GET['id'] . '"/>
                    <input type="submit" value="Purchase Ticket"/>
                </form>
            ';
            echo '
                <form action="review.php">
                    <input type="submit" value="Review Museum"/>
                </form>
                <form action="reviews.php">
                    <input type="submit" value="View Other Reviews"/>
                </form>
                <form action="index.php">
                    <input type="submit" value="Back"/>
                </form>
            ';
        ?>
    </body>
</html>
