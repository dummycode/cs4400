<?php
    function displayMyTickets(int $id) {
        require_once(__DIR__ . '/../api/tickets.php');
        $tickets = getMyTickets($id);
        echo "<table border = '1'>";
        echo "<tr><th>Museum Ticket</th><th>Purchase Date</th><th>Price</th></tr>";
        foreach($tickets as $ticket) {
            echo "<tr><td>" . $ticket['museum_id'] . "</td><td>" . $ticket['purchase_timestamp'] . "</td><td>" . $ticket['price'] . "</td></tr>";
        }
        echo "</table>";
    }
?>
