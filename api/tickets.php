<?php
    require_once(__DIR__ . '/../crud/database.php');
    require_once(__DIR__ . '/../crud/user.php');

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

    function purchaseTicket(int $museum_id) {
        $conn = getDatabaseConnection();
        if (!$conn) {
            echo "Error connecting to database<br>";
        } else {
            $sql = "SELECT *
                    FROM Ticket
                    WHERE museum_id ='" . $museum_id . "';";

            $result = mysqli_query($conn, $sql);

            if ($result) {
                // Already have a ticket
                if (mysqli_num_rows($result) > 0) {
                    echo "You already have a ticket";
                } else {
                    // Buy a ticket
                    $sql = "
                        INSERT INTO Ticket(museum_id, visitor_id)
                        VALUES(" . $museum_id . ", " . getLoggedUserId() . ");
                    ";
                }
            } else {
                echo "Failed query<br>" . mysqli_error($conn);
            }
        }
    }
?>
