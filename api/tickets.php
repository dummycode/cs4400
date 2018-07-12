<?php
    require_once(__DIR__ . '/../crud/database.php');

    function getMyTickets(int $id) {
        $conn = getDatabaseConnection();
        if (!$conn) {
            echo "Error connecting to database<br>";
        } else {
            $sql = "SELECT *
                    FROM Ticket
                    WHERE visitor_id ='" . $id . "';";

            $result = mysqli_query($conn, $sql);
            if ($result) {
                $tickets = [];
                while($ticket = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
                    $tickets[] = $ticket;
                }
                return $tickets;
            } else {
                echo "Failed query<br>" . mysqli_error($conn);
            }
        }
    }
?>