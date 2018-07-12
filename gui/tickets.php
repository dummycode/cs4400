<html>
    <body>
        <h1>My Tickets</h1>
        <?php
            require_once(__DIR__ . '/../api/tickets.php');
            $tickets = getMyTickets($_COOKIE['token']);
            echo "<table border = '1'>";
            echo "<tr><th>Museum Ticket</th><th>Purchase Date</th><th>Price</th></tr>";
            foreach($tickets as $ticket) {
                echo "<tr><td>" . $ticket['museum_id'] . "</td><td>" . $ticket['purchase_timestamp'] . "</td><td>" . $ticket['price'] . "</td></tr>";
            }
            echo "</table>";
        ?>
        <form action="../index.php">
            <input type="submit" value="Back"/>
        </form>
    </body>
</html>