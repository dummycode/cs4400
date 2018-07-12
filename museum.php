<html>
    <body>
        <?php
            require_once(__DIR__ . '/gui/museums.php');
            displayMuseum($_GET['id']);
        ?>
        <form action="purchase.php">
            <input type="submit" value="Purchase Ticket"/>
        </form>
        <form action="review.php">
            <input type="submit" value="Review Museum"/>
        </form>
        <form action="reviews.php">
            <input type="submit" value="View Other Reviews"/>
        </form>
        <form action="index.php">
            <input type="submit" value="Back"/>
        </form>
    </body>
</html>
