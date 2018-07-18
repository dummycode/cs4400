<?php
    function displayMyTickets(int $id) {
        require_once(__DIR__ . '/../api/tickets.php');
        $tickets = getMyTickets($id);

        echo "<table border = '1'>";
        echo "
            <tr>
                <th>Museum Ticket</th>
                <th>Purchase Date</th>
                <th>Price</th>
            </tr>";

        foreach($tickets as $ticket) {
            echo "
                <tr>
                    <td><a href=\"./museum.php?id=" . $ticket['museum_id'] . "\">" . $ticket['name'] . "</a></td>
                    <td>" . $ticket['purchase_timestamp'] . "</td>
                    <td>" . ($ticket['price'] ?? 'Free') . "</td>
                </tr>
            ";
        }
        echo "</table>";
    }
?>
